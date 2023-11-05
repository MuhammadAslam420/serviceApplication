<?php

namespace App\Livewire\Web;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ThankYouComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.web.thank-you-component');
    }
}
