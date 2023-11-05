<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubCategoriesComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $editedCategoryId;
    public $editedValue;
    public $editfield;

    public $sort='asc';
    public $perPage =5;
    public $search;

    public function startEdit($id,$field)
    {
        $this->editedCategoryId = $id;
        $this->editfield = $field;
        $category = SubCategory::find($id);
        $this->editedValue = $category->{$field};
    }

    public function updateName($id)
    {
        $category = SubCategory::find($id);
        $category->{$this->editfield} = $this->editedValue;
        if($this->editfield === 'name'){
            $category->slug = Str::slug($this->editedValue,'-');
        }
        $category->save();

        $this->editedCategoryId = null;
        $this->editfield = null;
        $this->alert('success','Value has been edit');
    }
    public function deleteCategory($id){
        $category = SubCategory::findOrFail($id);
        if ($category) {
            $category->delete(); // Use the delete() method to soft delete the record
            $this->alert('success', 'SubCategory has been deleted successfully');
        } else {
            $this->alert('warning', 'SubCategory not found' . $id);
        }
    }
    
    public function render()
    {
        $subcategories = SubCategory::where('name','like','%' . $this->search. '%')->orWhere('slug','like','%' . $this->search. '%')->
        orderBy('id',$this->sort)->paginate($this->perPage);
        return view('livewire.admin.subcategories.admin-sub-categories-component',['subcategories'=>$subcategories]);
    }
}
