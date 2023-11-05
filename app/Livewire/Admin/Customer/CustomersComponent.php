<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomersComponent extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.customer.customers-component');
    }
}
