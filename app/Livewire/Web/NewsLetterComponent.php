<?php

namespace App\Livewire\Web;

use App\Models\NewsLetter;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewsLetterComponent extends Component
{
    use LivewireAlert;
    #[Rule('required|email')]
    public $email;

    public function sendLetter()
{
    $this->validate();

    try {
        $letter = NewsLetter::where('email', $this->email)->first();

        if ($letter) {
            $this->alert('success', 'You are already subscribed to the newsletter');
        } else {
            $message = new NewsLetter();
            $message->email = $this->email;
            $message->save();
            $this->alert('success', 'Successfully subscribed to the newsletter');
        }

        $this->reset();
    } catch (\Exception $e) {
        $this->alert('error', $e->getMessage());
    }
}

    public function render()
    {
        return view('livewire.web.news-letter-component');
    }
}
