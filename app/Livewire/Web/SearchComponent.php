<?php

namespace App\Livewire\Web;

use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.base')]
    public $searchQuery;
    public $location;

    public $viewMode = 'grid';
    public $sorting = 'default';
    public $advance_sorting = '';

    public $perPage;

    public $category_id;
    public $service_type_id;
    public $city;
    public $sub_category_id;
    public $title;
    public $minprice;
    public $maxprice;

    public function mount()
    {

        $this->minprice = 10;
        $this->maxprice = 10000;
        $this->fill(request()->only('searchQuery', 'location'));
    }

    public function switchToGridView()
    {
        $this->viewMode = 'grid';
    }

    public function switchToListView()
    {
        $this->viewMode = 'list';
    }
    public function countViews($serviceId)
    {
        $service = Service::find($serviceId);
        $service->views += 1;
        $service->save();

    }
    public function addToCart($id, $name, $price, $service_provider_user)
    {
        $cart = Cart::instance('cart');

        // Check if the cart is not empty
        if ($cart->count() > 0) {
            // Compare the service_provider_user of the current item with the new one
            $firstItem = $cart->content()->first();

            // Assuming the user_id is a property of the model associated with the cart item
            if ($firstItem->model->user_id != $service_provider_user) {
                // Service provider is different, show a warning message
                $this->alert('warning', 'Please complete your booking with the current service provider before selecting another one.');
                return;
            }
        }

        // If no conflicting items found, add the new item to the cart
        $cart->add($id, $name, 1, $price)->associate("App\Models\Service");
        $this->alert('success', 'Service has been added to your cart successfully');
    }

    public function render()
    {
        
        try {

            $query = Service::where('title', 'like', '%' . $this->searchQuery . '%')
                ->where('city', 'like', '%' . $this->location . '%')->where('status', 'active')
                ->where('approved', 'yes');
            if ($this->title) {
                $query->where('title', 'like', '%' . $this->title .'%');
            }
            if ($this->city) {
                $query->where('city','like', '%' . $this->city .'%');
            }
            if ($this->category_id) {
                $query->where('category_id', $this->category_id);
            }
            if ($this->sub_category_id) {
                $query->where('sub_category_id', $this->sub_category_id);
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

            return view('livewire.web.search-component', ['services' => $services, 'categories' => $categories, 'types' => $types]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }

    }
}
