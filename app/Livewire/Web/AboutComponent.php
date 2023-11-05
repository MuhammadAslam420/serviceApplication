<?php

namespace App\Livewire\Web;

use App\Models\About;
use App\Models\Booking;
use App\Models\Offer;
use App\Models\Page;
use App\Models\Question;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AboutComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        try {
            $about  = Page::where('name','about')->firstorFail();
            //dd($about);
            $aboutPage = About::firstorFail();
            $users = User::where('utype','USR')->count();
            $bookings = Booking::count();
            $booking_completed = Booking::where('bookingstatus','completed')->count();
            $top_providers = Service::where('status', 'active')
            ->whereHas('reviews', function ($query) {
                $query->where('rating', '>=', 4);
            })->inRandomOrder()->take(4)
            ->get();
            $userreviews = Review::inRandomOrder()->limit(4)->get();
            $offer = Offer::firstorFail();
            $questions = Question::get();
            return view('livewire.web.about-component',['about'=>$about,'users'=>$users,
            'bookings'=>$bookings,'booking_completed'=>$booking_completed,
            'top_providers'=>$top_providers,'userreviews'=>$userreviews,
            'offer'=>$offer,'aboutPage'=>$aboutPage,'questions'=>$questions]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
}
