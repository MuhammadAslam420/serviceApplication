<?php

namespace App\Livewire\User;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserChatComponent extends Component
{
    #[Layout('layouts.base')]
    public $selectedChatId;
    public $messageText;
    public $providerId = '';
    public $provider = '';
    public $messages = [];
    public $search;

    public function sendMessage()
    {
        // Ensure that a chat is selected before sending a message
        if (!$this->selectedChatId) {
            return;
        }

        // Create and save a new message in the database
        Message::create([
            'chat_id' => $this->selectedChatId,
            'user_id' => Auth::user()->id,
            'content' => $this->messageText,
        ]);

        // Clear the message input field
        $this->messageText = '';
        $this->loadMessages();
    }

    public function getProvider()
    {
        if ($this->selectedChatId) {
            $chat = Chat::find($this->selectedChatId);
            $this->providerId = $chat->service_provider_id;
            $this->provider = User::find($this->providerId);
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

    public function selectChat($chatId)
    {
        $this->selectedChatId = $chatId;
        $this->loadMessages();
        $this->getProvider(); // Call getProvider to update provider information
    }

    public function render()
    {
        $chats = Chat::where('user_id', Auth::user()->id)
        ->where(function ($query) {
            $query->whereHas('provider', function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })
        ->get();
    
        return view('livewire.user.user-chat-component', ['chats' => $chats]);
    }
}
