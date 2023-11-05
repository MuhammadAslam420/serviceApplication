<?php

namespace App\Livewire\Web;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithPagination;
    #[Layout('layouts.base')]
    public function render()
    {
        $blogs = Blog::paginate(12);
        return view('livewire.web.blogs-component',['blogs'=>$blogs]);
    }
}
