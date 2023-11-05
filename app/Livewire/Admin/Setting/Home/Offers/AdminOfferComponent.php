<?php

namespace App\Livewire\Admin\Setting\Home\Offers;

use App\Models\Offer;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminOfferComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.admin')]
    public $title;
    public $description;
    public $image;
    public $status;
    public $new_image;
    public $link;
    public function mount()
    {
        $offer  = Offer::find(1);
        $this->title = $offer->title;
        $this->description = $offer->description;
        $this->image = $offer->image;
        $this->link = $offer->link;
        $this->status = $offer->status; 
    }
    public function updateOffer()
    {
        $this->validate([
            'title'=>'required|string|min:3',
            'description'=>"nullable|string",
            'status'=>'required|string|in:active,inactive',
            'link'=>'required|string',
            'new_image'=>'nullable|image'
        ],[
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.min' => 'The title must be at least 3 characters long.',
            'description.string' => 'The description must be a string.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be "active" or "inactive".',
            'link.string' => 'The link must be a string.',
            'new_image.nullable' => 'An image is nullable.',
            'new_image.image' => 'The uploaded file must be an image.',
        ]);
        if($this->new_image){
            $image = Carbon::now()->timestamp.'.'.$this->new_image;
            $this->image->storeAs('assets/imgs/offer',$image);
        }else{
            $image = $this->image;
        }
        $offer = Offer::find(1);
        $offer->title = $this->title;
        $offer->description = $this->description;
        $offer->link = $this->link;
        $offer->image = $image;
        $offer->status = $this->status;
        $offer->save();
        $this->alert('success','Offer has been updated');
    }
    public function render()
    {
        return view('livewire.admin.setting.home.offers.admin-offer-component');
    }
}
