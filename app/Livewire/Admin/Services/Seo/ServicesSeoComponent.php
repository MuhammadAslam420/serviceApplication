<?php

namespace App\Livewire\Admin\Services\Seo;

use App\Models\Seo;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesSeoComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.admin')]
    public $search;
    public $searchSeo;
    public $sort='desc';
    public $perPage =10;
    public function render()
    {
        $seos = Seo::where(function ($query){
            $query->whereHas('service',function($serviceQuery){
                $serviceQuery->where('title','like','%' . $this->search . '%');
            });
        })->where('meta_keywords','like','%' .$this->searchSeo .'%')->orderBy('created_at',$this->sort)->paginate($this->perPage);
        return view('livewire.admin.services.seo.services-seo-component',['seos'=>$seos]);
    }
}
