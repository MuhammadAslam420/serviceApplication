<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\SubCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDeletedSubCategoriesComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $perPage;
    public $search;
    public function makeLive($id)
    {
        $sub = SubCategory::withTrashed()->find($id);
        if ($sub) {
            $sub->deleted_at = null;
            $sub->save();
            $this->alert('success', 'SubCategory has been active again');
        } else {
            $this->alert('warning', 'SubCategory not exist');
        }

    }
    public function render()
    {
        $subcategories = SubCategory::withTrashed()->whereNotNull('deleted_at')->where('name','like','%' . $this->search . '%')->paginate($this->perPage);
        return view('livewire.admin.subcategories.admin-deleted-sub-categories-component',['subcategories'=>$subcategories  ]);
    }
}
