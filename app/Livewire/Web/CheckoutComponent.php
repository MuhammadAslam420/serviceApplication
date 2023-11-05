<?php

namespace App\Livewire\Web;

use App\Mail\OrderConfirmation;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Transaction;
use Cartalyst\Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CheckoutComponent extends Component
{
    #[Layout('layouts.base')]

    #[Rule('required|email')]
    public $email;

    #[Rule('required')]
    public $mobile;

    #[Rule('required')]
    public $address;

    #[Rule('required')]
    public $city;

    #[Rule('required')]
    public $country;

    #[Rule('required')]
    public $zipcode;

    #[Rule('required')]
    public $booking_date;

    #[Rule('required')]
    public $booking_time;

    public $payment = 'cod';

    public $thankyou;
    public $number;
    public $name;
    public $expiry_month;
    public $exp_year;
    public $cvc;

    public function placeBooking()
    {

        if ($this->payment === 'card') {
            $this->validate([
                'name' => 'required|string',
                'number' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }
        try {
            $this->validate();
            DB::beginTransaction();
            $booking = new Booking();
            $booking->user_id = Auth::user()->id;
            $booking->subtotal = session()->get('checkout')['subtotal'];
            $booking->discount = session()->get('checkout')['discount'];
            $booking->tax = session()->get('checkout')['tax'];
            $booking->total = session()->get('checkout')['total'];
            $booking->email = $this->email;
            $booking->mobile = $this->mobile;
            $booking->address = $this->address;
            $booking->country = $this->country;
            $booking->city = $this->city;
            if ($this->payment === 'card') {
                $booking->bookingstatus === 'confirmed';
            } else {
                $booking->bookingstatus === 'pending';
            }

            $booking->booking_date = $this->booking_date;
            $booking->booking_time = $this->booking_time;
            $booking->save();
            foreach (Cart::instance('cart')->content() as $item) {
                $bookingItem = new BookingItem();
                $bookingItem->booking_id = $booking->id;
                $bookingItem->provider_id = $item->model->user_id;
                $bookingItem->service_id = $item->id;
                $bookingItem->price = $item->price;
                $bookingItem->qty = $item->qty;

                $additionalServiceIds = []; // Create an array to store the additional service IDs

                if ($additionalServices = $item->options['additional_services'] ?? []) {
                    foreach ($additionalServices as $additionalService) {
                        $additionalServiceIds[] = $additionalService['additional_service_id']; // Add each ID to the array
                    }
                }

                $bookingItem->additional_service_id = implode(',', $additionalServiceIds); // Concatenate IDs

                $bookingItem->save();
            }

            if ($this->payment === 'cod' || $this->payment === 'jazzcash' || $this->payment === 'easypaisa') {
                $transactionStatus = 'pending';

            } else if ($this->payment === 'card') {
                $stripe = Stripe::make(env('STRIPE_KEY'));

                try {
                    $token = $stripe->tokens()->create([
                        'card' => [
                            'number' => $this->number,
                            'exp_month' => $this->expiry_month,
                            'exp_year' => $this->expiry_year,
                            'cvc' => $this->cvc,
                        ],
                    ]);
                    if (!isset($token['id'])) {
                        $this->alert('warning', 'Your Input card information is not correct please try later with valid card!');
                        $this->thankyou = 0;

                    }
                    $customer = $stripe->customers()->create([
                        'name' => Auth::user()->name,
                        'email' => $this->email,
                        'phone' => $this->mobile,
                        'address' => [
                            'line1' => $this->address,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            // 'state' => $this->province,
                            'country' => $this->country,
                        ],
                        'shipping' => [
                            'name' => Auth::user()->name,
                            'address' => [
                                'line1' => $this->address,
                                'postal_code' => $this->zipcode,
                                'city' => $this->city,
                                // 'state' => $this->province,
                                'country' => $this->country,
                            ],

                        ],
                        'source' => $token['id'],
                    ]);

                    $charge = $stripe->charges()->create([
                        'customer' => $customer['id'],
                        'currency' => 'PKR',
                        'amount' => session()->get('checkout')['total'],
                        'description' => 'Payment for booking number' . $booking->id,

                    ]);
                    if ($charge['status'] == 'succeeded') {
                        $transactionStatus = 'completed';

                        $this->resetcart();
                    } else {
                        $this->alert('warning', 'Error in transaction');
                        $this->thankyou = 0;
                    }
                } catch (\Exception $e) {
                    $this->alert('error', $e->getMessage());
                    $this->thankyou = 0;
                }

            }
            $this->makeTransaction($booking->id, $transactionStatus);
            $this->resetcart();
            // $this->orderConfirmationMail($booking);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function resetcart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    public function makeTransaction($booking_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->booking_id = $booking_id;
        $transaction->payment_mode = $this->payment;
        $transaction->total = Cart::total();
        $transaction->status = $status;
        $transaction->save();
    }
    public function orderConfirmationMail($booking)
    {
        Mail::to($booking->email)->send(new OrderConfirmation($booking));

    }
    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thanks');
        } else if (!session()->get('checkout')) {
            return redirect()->route('services');
        }
    }
    // public function getSelectedDate( $date ) {

    //     $this->booking_date = $date;
    //     dd($this->booking_date);

    // }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.web.checkout-component');
    }
}
