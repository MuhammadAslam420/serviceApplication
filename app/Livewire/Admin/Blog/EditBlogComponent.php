<?php

namespace App\Livewire\Admin\Blog;

use App\Aslam\Blog\Blogs;
use App\Models\Blog;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBlogComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $image;
    public $title;
    public $subtitle;
    public $status;
    public $description;
    public $blogId;
    public $new_image;
    public function mount($id)
    {
        $this->blogId = $id;
        $blog = Blog::find($this->blogId);
        $this->title = $blog->title;
        $this->subtitle = $blog->subtitle;
        $this->status = $blog->status;
        $this->description = $blog->description;
        $this->image = $blog->image;

    }
    public function editBlog()
    {
        $this->validate([
            'title' => 'required|string|min:5',
            'subtitle' => 'required|string',
            'description' => 'required',
            'status' => 'required',
            'new_image' => 'nullable|image',
        ]);
        try {
            if ($this->new_image) {
                $new_image = Carbon::now()->timestamp . '.' . $this->new_image->extension();
                $this->image->StoreAs('assets/imgs/blog', $new_image);
            } else {
                $new_image = $this->image;
            }
            $data = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'description' => $this->description,
                'status' => $this->status,
                'image' => $new_image,
            ];
            $blog = new Blogs();
            $blog->createOrEdit($id = $this->blogId, $data);
            $this->alert('success', 'blog has been edit');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        return view('livewire.admin.blog.edit-blog-component');
    }
}
