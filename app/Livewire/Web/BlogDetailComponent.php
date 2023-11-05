<?php

namespace App\Livewire\Web;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BlogDetailComponent extends Component
{
    #[Layout('layouts.base')]

    public $blog_id;

    public function mount($id){
        $this->blog_id = $id;
    }
    public function render()
    {
        try{
            $blog = Blog::findorFail($this->blog_id);
            return view('livewire.web.blog-detail-component',['blog'=>$blog]);
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component',compact('errorMessage'));
        }
    }
}
