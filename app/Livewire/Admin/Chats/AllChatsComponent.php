<?php

namespace App\Livewire\Admin\Chats;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AllChatsComponent extends Component
{
    #[Layout("layouts.admin")]

    public $selectedChatId;
    public $messages = [];
    public $providerId = '';
    public $provider = '';
    public $userId = '';
    public $user = '';
    public $search;
    public function selectChat($chatId)
    {
        $this->reset();
        $this->selectedChatId = $chatId;
        $this->loadMessages();
        $this->getProvider();
        $this->getUser();
       
    }
    public function getProvider()
    {
        if ($this->selectedChatId) {
            $chat = Chat::find($this->selectedChatId);
            $this->providerId = $chat->service_provider_id;
            $this->provider = User::find($this->providerId);
        }
    }
    public function getUser()
    {
        if ($this->selectedChatId) {
            $chat = Chat::find($this->selectedChatId);
            $this->userId = $chat->user_id;
            $this->user = User::find($this->userId);
        }
    }
    public function loadMessages()
    {
        // Ensure $this->selectedChatId is set and not null
        if ($this->selectedChatId) {
            $this->messages = Message::where('chat_id', $this->selectedChatId)
                ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                ->get();
        }
    }
    public function render()
    {
        $chats = Chat::where(function ($query) {
            $query->whereHas('user', function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })
        ->get();
        return view('livewire.admin.chats.all-chats-component',['chats'=>$chats]);
    }
}
