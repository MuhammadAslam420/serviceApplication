<?php

namespace App\Livewire\Admin\Reviews;

use App\Models\Review;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReviewsComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $search;
    public $perPage  = 10;
    public $sort= 'asc';
    public function render()
    {
        $reviews = Review::where('comments','like','%' . $this->search . '%')->orWhere('rating','like','%' . $this->search . '%')->orderBy('created_at',$this->sort)->paginate($this->perPage);
        return view('livewire.admin.reviews.admin-reviews-component',['reviews'=>$reviews]);
    }
}
