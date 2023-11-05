<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $name;
    public $slug;
    public $status;
    public $logo;
    public $overlay;

    public function slugGenerate()
    {
        $this->slug = Str::slug($this->name,'-');

    }

    public function addCategory(){
        $this->validate([
             'name'=>'required|string|min:3',
             'slug'=>'required|string|unique:categories,slug',
             'logo'=>'required|image|max:2048',
             'overlay'=>'required|image|max:2048',
             'status'=>'required|string'
        ]);
        try{
            $category  = New Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->status = $this->status;
            if($this->logo){
                $imageName = Carbon::now()->timestamp.'.'.$this->logo->extension();
                $this->logo->storeAs('assets/imgs/category',$imageName);
               $category->logo = $imageName;
            }
            if($this->overlay){
                $image = Carbon::now()->timestamp.'.'.$this->overlay->extension();
                $this->overlay->storeAs('assets/imgs/services/default',$image);
               $category->overlay = $image;
            }
            $category->save();
            $this->alert('success','New Category has been created successfully');
            $this->reset();
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component',compact('errorMessage'));
        }
    }
    
    public function render()
    {
        return view('livewire.admin.categories.admin-add-category-component');
    }
}
