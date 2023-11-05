<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ProvidersComponent extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.customer.providers-component');
    }
}
