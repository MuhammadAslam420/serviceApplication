<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DeletedServicesComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $perPage;
    public $search;
    public function makeLive($id)
    {
        $service = Service::withTrashed()->find($id);
        if ($service) {
            $service->deleted_at = null;
            $service->save();
            $this->alert('success', 'Service has been active again');
        } else {
            $this->alert('warning', 'Service not exist');
        }

    }
    public function render()
    {
        $services = Service::withTrashed()->where('title', 'like', '%' . $this->search . '%')->whereNotNull('deleted_at')->paginate($this->perPage);
        return view('livewire.admin.services.deleted-services-component', ['services' => $services]);
    }
}
