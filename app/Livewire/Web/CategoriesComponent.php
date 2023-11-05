<?php

namespace App\Livewire\Web;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
{
    use WithPagination;
    #[Layout('layouts.base')]

    public $search;
    public function render()
    {
        $categories = Category::where('name','like','%'.$this->search .'%')->paginate(8);
        return view('livewire.web.categories-component',['categories'=>$categories]);
    }
}
