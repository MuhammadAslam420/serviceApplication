<?php

namespace App\Livewire\Admin\Setting\Home\Packages;

use App\Models\Package;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AddPackageComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $name;
    public $description;
    public $price;
    public $status;
    public function addPackage(){
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $package = Package::find($this->package_id);
        $package->name = $this->name;
        $package->description = $this->description;
        $package->price = $this->price;
        $package->status = $this->status;
        $package->save();

        $this->alert('success','Package has been updated successfully.');
    }
    public function render()
    {
        return view('livewire.admin.setting.home.packages.add-package-component');
    }
}
