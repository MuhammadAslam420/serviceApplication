<?php

namespace App\Livewire\Admin\Setting\Home;

use App\Models\Banner;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditBannersComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $status;
    public $new_image;
    public $banId;
    public function mount($id){
        $this->banId = $id;
        $banner = Banner::find($this->banId);
        $this->title = $banner->title;
        $this->subtitle = $banner->subtitle;
        $this->link = $banner->link;
        $this->image = $banner->image;
        $this->status = $banner->status;
    

    }
    public function editBanner()
    {
        $this->validate([
            'title'=>'required|string|min:3',
            'subtitle'=>"nullable|string",
            'status'=>'required|string|in:active,inactive',
            'link'=>'nullable|string',
            'new_image'=>'nullable|image'
        ],[
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.min' => 'The title must be at least 3 characters long.',
            'subtitle.string' => 'The subtitle must be a string.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be "active" or "inactive".',
            'link.string' => 'The link must be a string.',
            'new_image.required' => 'An image is required.',
            'new_image.image' => 'The uploaded file must be an image.',
        ]);
        if($this->new_image){
            $image = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->StoreAs('assets/imgs', $image);
            if (file_exists('assets/imgs/' . $this->image)) {
                unlink('assets/imgs/' . $this->image);
            }
        }else{
            $image=$this->image;
        }
        $banner =Banner::find($this->banId)->update([
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'link'=>$this->link,
            'status'=>$this->status,
            'image'=>$image
        ]);
        $this->alert('success','Banner has been edited');
        
    }
    public function render()
    {
        return view('livewire.admin.setting.home.admin-edit-banners-component');
    }
}
