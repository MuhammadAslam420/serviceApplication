<?php

namespace App\Livewire\Web;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CartComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.base')]
    public $havecouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public $taxAfetrDiscount;
    public function removeDromCart($rowId)
    {
        try {
            $item = Cart::instance('cart')->get($rowId);
            if (!$item) {
                $this->alert('warning', 'There is no service exist in your cart with this name', [
                    'position' => 'center',
                    'timer' => 5000,
                    'toast' => false,
                    'timerProgressBar' => true,
                ]);
            } else {
                Cart::instance('cart')->remove($rowId);
                $this->alert('success', 'Item has been removed from the cart successfully',[
                    'position' => 'center',
                    'timer' => 5000,
                    'toast' => false,
                    'timerProgressBar' => true,
                ]);
            }
        } catch (InvalidRowIDException $e) {
            // Handle the exception specific to invalid row IDs.
            $this->alert('error', $e->getMessage(), [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {

            $this->alert('error', $e->getMessage(), [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);

        }
    }
    public function applyCouponCode()
    {
        $cartItems = Cart::instance('cart')->content();

        if ($cartItems->isEmpty()) {
            session()->flash('message', 'Cart is empty!');
            return;
        }
        // Get the first cart item (assuming all items have the same user_id)
        $firstCartItem = $cartItems->first();
        $service = $firstCartItem->model;
       // dd($service);
        $adminCoupon = Coupon::where('code', $this->couponCode)
            ->where('utype', 'ADM')
            ->where('is_active', true)
            ->where('discount_amount', '<=', Cart::instance('cart')->subtotal())
            ->first();
        if (!$adminCoupon) {
            $vendorCoupon = Coupon::where('code', $this->couponCode)
                ->where('utype', 'VEN')
                ->where('user_id',$service->user_id)
                ->where('is_active', true)
                ->where('discount_amount', '<=', Cart::instance('cart')->subtotal())
                ->first();

            if (!$vendorCoupon) {
                $this->alert('warning', 'Coupon Code is not Valid!');
                
            }
            session()->put('coupon', [
                'code' => $vendorCoupon->code,
                'type' => $vendorCoupon->type,
                'discount_amount' => $vendorCoupon->discount_amount,
                'cart_value' => Cart::instance('cart')->subtotal(),
            ]);
            $this->alert('success','Coupon Apply Successfully');
        } else {
            // If an admin coupon is found, store it in the session
            session()->put('coupon', [
                'code' => $adminCoupon->code,
                'type' => $adminCoupon->type,
                'discount_amount' => $adminCoupon->discount_amount,
                'cart_value' => Cart::instance('cart')->subtotal(),
            ]);
            $this->alert('success','Coupon Apply Successfully Admin');
        }
    }
    public function calculateDiscount()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['discount_amount'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['discount_amount']) / 100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfetrDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfetrDiscount;
        }
    }
    public function checkout()
    {
        if (Auth::check()) {
            // User is authenticated
            if (Cart::instance('cart')->count() > 0) {
                return redirect()->route('checkout');
            } else{
                return redirect()->route('services');
            }
        } else {
            return redirect()->route('login');
        }
    }
    
    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return ;
        }
        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfetrDiscount,
                'total' => $this->totalAfterDiscount,
            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);

        }
    }
   
    public function removeCoupon()
    {
        session()->forget('coupon');
    }
    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else{
                $this->calculateDiscount();
            }
        }
       
        $this->setAmountForCheckout();
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
        }
     
        return view('livewire.web.cart-component');
    }
}
