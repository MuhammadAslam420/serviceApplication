<?php

namespace App\Livewire\Admin\Reports\Abuse;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AbuseReportsComponent extends Component
{
    #[Layout('layouts.admin')]

    public function render()
    {
        return view('livewire.admin.reports.abuse.abuse-reports-component');
    }
}
