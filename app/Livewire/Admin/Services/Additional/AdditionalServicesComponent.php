<?php

namespace App\Livewire\Admin\Services\Additional;

use App\Models\AdditionalService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AdditionalServicesComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.admin')]
    public $perPage = 10;
    public $search;
    public $searchAdd;
    public $sort ='desc';
    public function render()
    {
        $additional_services = AdditionalService::where(function ($query){
            $query->whereHas('service',function ($serviceQuery){
                $serviceQuery->where('title','like','%'.$this->search . '%');
            });
        })
        ->where('name','like','%' . $this->searchAdd .'%')->orderBy('created_at',$this->sort)
        ->paginate($this->perPage);
        return view('livewire.admin.services.additional.additional-services-component',['additional_services'=>$additional_services]);
    }
}
