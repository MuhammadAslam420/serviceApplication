<?php

namespace App\Livewire\Web;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ProvidersComponent extends Component
{
    use WithPagination;
    #[Layout('layouts.base')]
    public $perPage =12;
    public $search;
    public function render()
    {
        $query = User::where('utype','VEN');
        if($this->search){
            $query->where('name','like','%'.$this->search .'%')->orWhere('username','like','%'.$this->search .'%');
        }
        $users = $query->paginate($this->perPage);
       // dd($users);
        return view('livewire.web.providers-component',['users'=>$users]);
    }
}
