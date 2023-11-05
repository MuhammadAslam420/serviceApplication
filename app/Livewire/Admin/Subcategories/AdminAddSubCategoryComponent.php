<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminAddSubCategoryComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $name;
    public $slug;
    public $category_id;

    
    public function slugGenerate(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function addSubCategory()
    {
        $this->validate([
            'category_id'=>'required',
            'name'=>'required|string',
            'slug'=>'required|string|unique:sub_categories,slug'
        ]);
        try{
            
            $sub = new SubCategory();
            $sub->category_id =$this->category_id;
            $sub->name = $this->name;
            $sub->slug = $this->slug;
            $sub->save();
            
            $this->alert('success','SubCategory has been created successfully');
            $this->reset();
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component',compact('errorMessage'));
        }
    }
    public function render()
    {
        $categories = Category::
        where('status', 'active')
        ->get();
        return view('livewire.admin.subcategories.admin-add-sub-category-component',compact('categories'));
    }
}
