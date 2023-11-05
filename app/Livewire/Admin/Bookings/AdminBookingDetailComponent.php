<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminBookingDetailComponent extends Component
{
    #[Layout('layouts.admin')]

    public $bookingId;

    public function mount($id){
        $this->bookingId = $id;
    }
    public function render()
    {
        try{
            $booking = Booking::findorFail($this->bookingId);
        return view('livewire.admin.bookings.admin-booking-detail-component',['booking'=>$booking]);
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component',compact('errorMessage'));
        }
    }
}
