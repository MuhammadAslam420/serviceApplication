<?php

namespace App\Livewire\Admin\Services;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Service;

class ServicesComponent extends Component
{
    #[Layout('layouts.admin')]
    public $selectedFeatured = [];
    public $selectedPosition = [];
    public $selectedRows = [];
    
    public function updateFeatured($id)
    {
        $service = Service::find($id);
    
        // Get the selected featured value from the request
        $selectedFeatured = $this->selectedFeatured[$id];
    
        // Check if the selected featured value is valid
        if (in_array($selectedFeatured, ['vip', 'top vip', 'non-featured'])) {
            $service->featured = $selectedFeatured;
            $service->save();
        }
    }
    
    public function updatePosition($id)
    {
        $service = Service::find($id);
    
        // Get the selected position value from the request
        $selectedPosition = $this->selectedPosition[$id];
    
        // Check if the selected position value is within the valid range
        if ($selectedPosition >= 0 && $selectedPosition <= 10) {
            $service->position = $selectedPosition;
            $service->save();
        }
    }
    
    public function render()
    {
        return view('livewire.admin.services.services-component');
    }
}
