<?php

namespace App\Livewire\Admin\Setting\Home\Packages;

use App\Models\Package;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AllPackagesComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.admin')]
    public $status = 'all';
    public $sort= 'desc';
    public $perPage = 10;

    public function updateStatus($id,$status)
    {
        $package = Package::find($id);
        $package->status = $status;
        $package->save();
        $this->alert('success','Package Status has been updated');
    }
    public function render()
    {
        $packages = Package::where('status',$this->status)->orderBy('id',$this->sort)->paginate($this->perPage);
        return view('livewire.admin.setting.home.packages.all-packages-component',['packages'=>$packages]);
    }
}
