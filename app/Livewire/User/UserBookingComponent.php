<?php

namespace App\Livewire\User;

use App\Models\Booking;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class UserBookingComponent extends Component
{
    use WithPagination;
    #[Layout('layouts.base')]
    public $perPage =1;
   
    public $sort;
    public $sort_date;

    public function reschedule($id,$name,$price)
    {
        Cart::instance('cart')->add($id,$name,1,$price)->associate("App\Models\Service");
        return redirect()->route('checkout');
    }
    public function render()
    {
        $query = Booking::where('user_id', Auth::user()->id);

      
        
        if ($this->sort_date) {
            $query->whereDate('booking_date', $this->sort_date);
        }
        
        if ($this->sort === 'date_asc') {
            $query->orderBy('booking_date', 'asc');
        } elseif ($this->sort === 'date_desc') {
            $query->orderBy('booking_date', 'desc');
        } elseif ($this->sort === 'completed') {
            $query->where('bookingstatus', 'completed');
        } elseif ($this->sort === 'pending') {
            $query->where('bookingstatus', 'pending');
        } elseif ($this->sort === 'confirmed') {
            $query->where('bookingstatus', 'confirmed');
        } else {
            // Default sorting
            $query->orderBy('id', 'asc');
        }
        
        $bookings = $query->paginate($this->perPage);
        
        //dd($bookings);
        return view('livewire.user.user-booking-component',['bookings'=>$bookings]);
    }
}
