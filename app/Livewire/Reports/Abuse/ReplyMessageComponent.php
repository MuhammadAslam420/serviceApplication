<?php

namespace App\Livewire\Reports\Abuse;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Mail\AbuseReplyMail;
class ReplyMessageComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $user_id;

    public $message;
    public $subject = 'Abuse Reply Mail Complaint | Do not reply here';
    public $to;
    public $user;

    public function mount($id)
    {
        $this->user_id = $id;
        $user = User::find($id);
        $this->to = $user->email;
        $this->user = $user;
        //dd($id);
    }
    public function sendMail()
    {
        $this->validate([
            'subject'=>'required|string',
            'to'=>'required',
            'message'=>'required|string'
        ]);
        $this->orderConfirmationMail();
        $this->alert('success','Mail has been sent');
        $this->reset();
    }
    public function orderConfirmationMail()
    {
        Mail::to('muhaffan945@gmail.com')->send(new AbuseReplyMail($this->message,$this->user));

    }
    public function render()
    {
        return view('livewire.reports.abuse.reply-message-component');
    }
}
