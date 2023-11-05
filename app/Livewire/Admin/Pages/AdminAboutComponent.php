<?php

namespace App\Livewire\Admin\Pages;

use App\Models\About;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAboutComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
     
    public $image;
    public $image1;
    public $image2;
    public $new_image;
    public $experience;

    public function mount()
    {
        $about = About::first();
        $this->experience = $about->experience;
        $this->image = $about->image;
        $this->image2 = $about->image2;
    }

    public function updateAbout()
    {
        $about = About::first();
        $about->experience = $this->experience; 
        if($this->image1)
        {
            $image = Carbon::now()->timestamp . '.' .$this->image1->extension();
            $this->image1->saveAs('assets/imgs',$image);
            $about->image = $image;

        }
        if($this->new_image)
        {
            $image = Carbon::now()->timestamp . '.' .$this->new_image->extension();
            $this->new_image->saveAs('assets/imgs',$image);
            $about->image2 = $image;
            
        }
        $about->save();
        $this->alert('success','About Content has been updated');
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-about-component');
    }
}
