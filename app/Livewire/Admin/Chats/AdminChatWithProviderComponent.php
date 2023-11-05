<?php

namespace App\Livewire\Admin\Chats;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminChatWithProviderComponent extends Component
{
    #[Layout('layouts.admin')]
    public $selectedChatId;
    public $messages = [];
    public $providerId = '';
    public $provider = '';
    public $userId = '';
    public $user = '';
    public $search;
    public $messageText;
    
    public function selectChat($providerId)
    {
        //dd($providerId);
        $this->providerId = $providerId;
        $this->getProvider();
        $this->loadMessages();
        
    }
    public function getProvider(){
        if($this->providerId){
            $this->provider =User::find($this->providerId);
        }
    }
    
    public function loadMessages()
    {
        $chat = Chat::where('user_id',Auth::user()->id)->where('service_provider_id',$this->providerId)->first();
        //dd($chat->id);
        if($chat){
            $this->selectedChatId = $chat->id;
        }else{
            $chat = Chat::create([
                'user_id'=>Auth::user()->id,
                'service_provider_id'=>$this->providerId,
            ]);
            $this->selectedChatId =$chat->id;
        }
        if ($this->selectedChatId) {
            $this->messages = Message::where('chat_id', $this->selectedChatId)
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $this->messages = [];
        }
    }
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
    
    public function render()
    {
        $users = User::where('name','like','%'.$this->search . '%')->where('utype','VEN')->where('admin_approved',1)->get();
        return view('livewire.admin.chats.admin-chat-with-provider-component',['users'=>$users]);
    }
}
