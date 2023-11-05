<?php

namespace App\Livewire\Web;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ErrorComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.web.error-component');
    }
}
