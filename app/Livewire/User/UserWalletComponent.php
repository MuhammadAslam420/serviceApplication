<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserWalletComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        return view('livewire.user.user-wallet-component');
    }
}
