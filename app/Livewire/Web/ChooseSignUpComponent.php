<?php

namespace App\Livewire\Web;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ChooseSignUpComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.web.choose-sign-up-component');
    }
}
