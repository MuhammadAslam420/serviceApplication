<?php

namespace App\Livewire\Web;

use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Setting;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ContactComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.base')]
   
    #[Rule('required|string')]
    public $name;

    #[Rule('required|email')]
    public $email;
    public $message;

    #[Rule('required|string')]
    public $phone;

    public function sendMessage()
    {
        $this->validate();
        try{
            $message = new ContactMessage();
            $message->name = $this->name;
            $message->email = $this->email;
            $message->phone = $this->phone;
            $message->message = $this->message;
            $message->save();
            $this->reset();
            $this->alert('success','Soon we Contact you!');
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        try {
            $cantact = Contact::firstorFail();
            $setting = Setting::firstorFail();
            return view('livewire.web.contact-component', ['cantact' => $cantact,'setting'=>$setting]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
}
