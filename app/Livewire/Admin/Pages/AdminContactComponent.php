<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Contact;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminContactComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
     
    public $image;
    public $image1;
    public $map;

    public function mount()
    {
        $conatct = Contact::first();
        $this->map = $conatct->map;
        $this->image = $conatct->image;
    }

    public function updateContact()
    {
        $conatct = Contact::first();
        $conatct->map = $this->map; 
        if($this->image1)
        {
            $image = Carbon::now()->timestamp . '.' .$this->image1->extension();
            $this->image1->saveAs('assets/imgs',$image);
            $conatct->image = $image;

        }
        $conatct->save();
        $this->alert('success','conatct Content has been updated');
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-contact-component');
    }
}
