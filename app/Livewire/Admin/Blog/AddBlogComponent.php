<?php

namespace App\Livewire\Admin\Blog;

use App\Aslam\Blog\Blogs;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddBlogComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $image;
    public $title;
    public $subtitle;
    public $status;
    public $description;

    public function addBlog()
    {
        $this->validate([
            'title' => 'required|string|min:5',
            'subtitle' => 'required|string',
            'description' => 'required',
            'status' => 'required',
            'image' => 'nullable|image',
        ]);
        try {
            if ($this->image) {
                $image = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->StoreAs('assets/imgs/blog', $image);
            } else {
                $image = '';
            }
            $data = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'description' => $this->description,
                'status' => $this->status,
                'image' => $image,
            ];
            $blog = new Blogs();
            $blog->createOrEdit($id = null ,$data);
            $this->alert('success', 'blog has been added');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        return view('livewire.admin.blog.add-blog-component');
    }
}
