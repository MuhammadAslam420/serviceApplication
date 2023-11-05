<?php

namespace App\Livewire\Admin\Blog;

use App\Aslam\Blog\Blogs;
use App\Models\Blog;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AllBlogsComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $sorting = 'desc';
    public $perPage = 10;
    #[Layout('layouts.admin')]

    public function blogDel($id){
        try{
            $blog = new Blogs();
            $blog->deleteBlog($id);
            $this->alert('success','Blog has been deleted');
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function updateStatus($id,$status){
        $blog = Blog::find($id);
        $blog->status = $status;
        $blog->save();
        $this->alert('success','Blog status has been updated');
    }
    
    public function render()
    {
        $blogs = Blog::orderBy('created_at',$this->sorting)->paginate($this->perPage);
        return view('livewire.admin.blog.all-blogs-component',['blogs'=>$blogs]);
    }
}
