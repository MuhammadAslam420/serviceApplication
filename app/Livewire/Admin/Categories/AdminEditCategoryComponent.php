<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $name;
    public $slug;
    public $status;
    public $logo;
    public $overlay;
    public $new_logo;
    public $new_overlay;
    public $categoryId;

    public function mount($id)
    {
        $this->categoryId = $id;
        $category = Category::find($this->categoryId);
        $this->name =  $category->name;
        $this->slug =  $category->slug;
        $this->status =  $category->status;
        $this->logo =  $category->logo;
        $this->overlay =  $category->overlay;
    }

    public function slugGenerate()
    {
        $this->slug = Str::slug($this->name, '-');

    }

    public function addCategory()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|unique:categories,slug,' . $this->categoryId,
            'new_logo' => 'nullable|image|max:2048',
            'new_overlay' => 'nullable|image|max:2048',
            'status' => 'required|string',
        ]);
        try {
            $category = Category::find($this->categoryId);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->status = $this->status;
            if ($this->new_logo) {
                $imageName = Carbon::now()->timestamp . '.' . $this->new_logo->extension();
                $this->new_logo->storeAs('assets/imgs/category', $imageName);
                $category->logo = $imageName;
            }
            if ($this->new_overlay) {
                $image = Carbon::now()->timestamp . '.' . $this->new_overlay->extension();
                $this->new_overlay->storeAs('assets/imgs/category', $image);
                $category->overlay = $image;
            }
            $category->save();
            $this->alert('success', 'Category has been updated successfully');
           
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        return view('livewire.admin.categories.admin-edit-category-component');
    }
}
