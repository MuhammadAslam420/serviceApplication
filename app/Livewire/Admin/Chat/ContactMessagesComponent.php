<?php

namespace App\Livewire\Admin\Chat;

use App\Mail\ReplyMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessagesComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $search;
    public $sort = 'desc';
    public $perPage = 10;
    public $replyText;
    public $isOpenModal=0;
    public $msgId;
    public function openModal($messageId)
    {
        $this->msgId=$messageId;
        $this->isOpenModal = true;

    }
    // public function mount()
    // {
    //     // Fetch the page data and populate the form fields
    //     if($this->msgId){
    //         $mesg = ContactMessage::find($this->msgId);
    //     //dd($page);
    //     // if ($question) {
    //     //     $this->question = $question->question;
    //     // }
    //     }
    // }
    public function replied()
    {
        //$this->openModal();
        $this->validate([
            'replyText' => 'required|string',
        ]);

        // Send an email reply
        $message = ContactMessage::find($this->msgId);
        if ($message) {
            Mail::to($message->email)->send(new ReplyMail($this->replyText));
        }
        $message->reply ='replied';
        $message->save();
        $this->closedModal();
        // Optionally, you can add a success message
        $this->alert('success', 'Reply sent successfully.');
    }
    public function closedModal()
    {
        $this->isOpenModal = false;
    }

    public function deleteMessage($messageId)
    {
        $message = ContactMessage::find($messageId);
        if ($message) {
            $message->delete();
            $this->alert('success', 'Message deleted successfully.');
        }
    }
    public function render()
    {
        $messages = ContactMessage::where('name', 'LIKE', '%' . $this->search . '%')->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', $this->sort)->paginate($this->perPage);
        return view('livewire.admin.chat.contact-messages-component', ['messages' => $messages]);
    }
}
