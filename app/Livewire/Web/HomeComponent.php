<?php

namespace App\Livewire\Web;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\HomePageSection;
use App\Models\MobileAppDetail;
use App\Models\Offer;
use App\Models\Package;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomeComponent extends Component
{
    //#[Layout('layouts.base')]
    public function mount()
    {
        $this->fill(request()->only('searchQuery', 'location'));
    }
    public function render()
    {
        try{
            $sections = HomePageSection::where('status', 'active')
        ->orderBy('position')
        ->get();
        $banners = Banner::where('status','active')->get();
        $categories = Category::where('status','active')->take(8)->get();
        $featuredservices = Service::where('status','active')->where('approved','yes')->where('featured','featured')->inRandomOrder()->get();
        $topservices = Service::where('status','active')->where('approved','yes')->where('featured','top')->inRandomOrder()->take(8)->get();
        $popularservices = Service::where('status','active')->where('approved','yes')->inRandomOrder()->take(8)->get();
        $packages = Package::orderBy('id','asc')->limit(3)->get();
        $userreviews  = Review::inRandomOrder()->limit(8)->get();
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $offer = Offer::where('status','active')->first();
        $partner = Partner::where('status','active')->first();
        $appl = MobileAppDetail::where('status','active')->first();
        $cities = Service::select('city')
        ->distinct()->orderBY('city','asc')
        ->get('city');
        $pages = Page::orderBy('id','asc')->get('name');
        return view('livewire.web.home-component',['banners'=>$banners,'categories'=>$categories,'featuredservices'=>$featuredservices,
    'topservices'=>$topservices,'popularservices'=>$popularservices,'packages'=>$packages,'cities'=>$cities,'userreviews'=>$userreviews,
    'blogs'=>$blogs,'sections'=>$sections,'offer'=>$offer,'partner'=>$partner,'appl'=>$appl ])->layout('layouts.base',['pages'=>$pages]);
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component',['errorMessage'=>$errorMessage]);
           }
    }
}
