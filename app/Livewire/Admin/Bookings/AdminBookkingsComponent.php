<?php

namespace App\Livewire\Admin\Bookings;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminBookkingsComponent extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.bookings.admin-bookkings-component');
    }
}
