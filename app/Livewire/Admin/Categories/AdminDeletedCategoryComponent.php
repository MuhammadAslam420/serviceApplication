<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDeletedCategoryComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public function makeLive($id)
    {
        
        $category = Category::withTrashed()->find($id);
        
        if ($category) {
            $category->deleted_at = null;
            $category->save();
            $this->alert('success', 'Category has been made live again');
        } else {
            $this->alert('error', 'Category not found');
        }
    }

    public function render()
    {
        $categories = Category::withTrashed()->whereNotNull('deleted_at')->paginate(10);

        return view('livewire.admin.categories.admin-deleted-category-component', ['categories' => $categories]);
    }
}
