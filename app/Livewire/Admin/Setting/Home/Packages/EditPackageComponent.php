<?php

namespace App\Livewire\Admin\Setting\Home\Packages;

use App\Models\Package;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditPackageComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $name;
    public $description;
    public $price;
    public $status;
    public $package_id;
    public function mount($id)
    {
        $this->package_id = $id;
        $package = Package::find($this->package_id);
        $this->name = $package->name;
        $this->description = $package->description;
        $this->price = $package->price;
        $this->status = $package->status;
    }

    public function updatePackage(){
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
        return view('livewire.admin.setting.home.packages.edit-package-component');
    }
}
