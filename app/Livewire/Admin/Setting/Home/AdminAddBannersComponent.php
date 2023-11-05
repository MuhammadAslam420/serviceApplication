<?php

namespace App\Livewire\Admin\Setting\Home;

use App\Models\Banner;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddBannersComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $status;

    public function addBanner()
    {
        $this->validate([
            'title'=>'required|string|min:3',
            'subtitle'=>"nullable|string",
            'status'=>'required|string|in:active,inactive',
            'link'=>'nullable|string',
            'image'=>'required|image'
        ],[
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.min' => 'The title must be at least 3 characters long.',
            'subtitle.string' => 'The subtitle must be a string.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be "active" or "inactive".',
            'link.string' => 'The link must be a string.',
            'image.required' => 'An image is required.',
            'image.image' => 'The uploaded file must be an image.',
        ]);
        if($this->image){
            $image = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->StoreAs('assets/imgs', $image);
        }else{
            $image='';
        }
        $banner =Banner::create([
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'link'=>$this->link,
            'status'=>$this->status,
            'image'=>$image
        ]);
        $this->alert('success','Banner has been created');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.setting.home.admin-add-banners-component');
    }
}
