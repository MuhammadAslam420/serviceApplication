<?php

namespace App\Livewire\Web;

use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\ServiceView;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class LocationComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.base')]
    public $perPage = 15;
    public $sorting;
    public $advance_sorting;
    public $service_type_id;
    public $category_id;
    public $title;
    public $viewMode = 'grid';

    public $minprice;
    public $maxprice;

    public $city;
    public $location;
    public $sub_category_id;

    public function mount($city)
    {
        $this->location = $city;
        $this->minprice = 10;
        $this->maxprice = 10000;
    }

    public function switchToGridView()
    {
        $this->viewMode = 'grid';
    }
    public function switchToListView()
    {
        $this->viewMode = 'list';
    }

    public function addToCart()
    {

    }
    public function countViews($id)
    {
        $service = Service::findorFail($id);
        $service->views += 1;
        $service->save();

        $view = new ServiceView();
        $view->service_id = $id;
        if (Auth::check()) {
            $view->user_id = Auth::user()->id;
        }
        $view->clicked = 1;
        $view->save();
    }

    public function render()
    {
        try{
            $query = Service::where('city', 'LIKE', '%' . $this->location . '%')
            // ->orWhere('zipcode', 'LIKE', '%' . $this->location . '%')
            // ->orWhere('state', 'LIKE', '%' . $this->location . '%')
            ->where('status', 'active')
            ->where('approved', 'yes')
            ->whereNull('deleted_at');
        
    if ($this->title) {
        $query->where('title', 'like', '%' . $this->title . '%');
    }
    if ($this->city) {
        $query->where('city', 'like', '%' . $this->city . '%');
    }
    if ($this->category_id) {
        $query->where('category_id', $this->category_id);
    }
    if ($this->service_type_id) {
        $query->where('service_type_id', $this->service_type_id);
    }
    if ($this->advance_sorting) {
        $query->where('featured', $this->advance_sorting);
    }
    if ($this->minprice || $this->maxprice) {
        $query->whereBetween('price', [$this->minprice, $this->maxprice]);
    }

    if ($this->sorting === 'asc') {
        $query->orderBy('price', 'asc');
    } elseif ($this->sorting === 'desc') {
        $query->orderBy('price', 'desc');
    } else {

        $query->orderBy('position', 'asc')->orderBy('price', 'asc');
    }
    //dd($query->toSql());
    $services = $query->paginate($this->perPage);

    $categories = Category::where('status', 'active')->get();
    $types = ServiceType::get();
    return view('livewire.web.location-component', ['services' => $services, 'categories' => $categories, 'types' => $types]);
       
    }catch(\Exception $e){
        $errorMessage = $e->getMessage();

        return view('livewire.web.error-component',compact('errorMessage'));
    }

    }
}
