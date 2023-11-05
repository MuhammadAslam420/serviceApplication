<?php

namespace App\Livewire\User;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class UserReviewsComponent extends Component
{
    use WithPagination;
    #[Layout('layouts.base')]

    public $sort ='desc';
    public $perPage = 5;
    public function render()
    {
        $reviews = Review::where('user_id',Auth::user()->id)->orderBy('created_at',$this->sort)->paginate($this->perPage);
        return view('livewire.user.user-reviews-component',['reviews'=>$reviews]);
    }
}
