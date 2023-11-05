<?php

namespace App\Livewire\Provider;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ProviderDashboardComponent extends Component
{
    #[Layout('layouts.provider')]
    public function render()
    {
        return view('livewire.provider.provider-dashboard-component');
    }
}
