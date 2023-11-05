<?php

namespace App\Livewire\Web;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ServiceByTypeComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.web.service-by-type-component');
    }
}
