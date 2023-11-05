<?php

namespace App\Livewire\Web;

use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ServiceDetailComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.base')]

    public $s_slug;
    public $selectedAdditionalServices = [];

    public function setAdditional($id, $price,$name)
    {
        // Append the selected additional service to the list
        $this->selectedAdditionalServices[] = [
            'id' => $id,
            'price' => $price,
            'name'=>$name,
        ];

        $this->alert('success', 'Additional Service has been added. You can continue to pick more.');
    }

    public function mount($slug)
    {
        $this->s_slug = $slug;
    }
    public function addToCart($id, $name, $price ,$service_provider_user)
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
        // Calculate the total price of additional services
        $additionalServicesTotal = 0;
        $additionalServiceOptions = [];
        // Check if any additional services are selected
        if (!empty($this->selectedAdditionalServices)) {
            // Create an array to store all the additional service options
            

            foreach ($this->selectedAdditionalServices as $additionalService) {
                $additionalServiceOptions[] = [
                    'additional_service_id' => $additionalService['id'],
                    'additional_service_name' => $additionalService['name'], // Include the name
                    'additional_service_price' => $additionalService['price'],
                ];

                // Add the additional service price to the total
                $additionalServicesTotal += $additionalService['price'];
            }
        }

        // Calculate the total price including the main service and additional services
        $totalPrice = $price + $additionalServicesTotal;

        // Add the main service item to the cart and associate it with all the additional services
        Cart::instance('cart')->add($id, $name, 1, $totalPrice, ['additional_services' => $additionalServiceOptions])->associate("App\Models\Service");

        $this->alert('success', 'Service has been added to your cart.');
    }

    public function addToWishlist($id, $name, $price)
    {
        Cart::instance('wishlist')->add($id, $name, 1, $price)->associate("App\Models\Service");
        $this->alert('success', 'Service Has Been Added To Your Wishlist');
    }
    public function render()
    {
        try {
            $shareButtons = \Share::page(
                'https://www.itsolutionstuff.com',

            )
                ->facebook()
                ->twitter()
                ->linkedin()
                ->telegram()
                ->whatsapp()
                ->reddit();
            //dd($shareButtons);
            $detail = Service::where('slug', $this->s_slug)->where('status', 'active')
                ->where('approved', 'yes')->first();
            $related = Service::where('category_id', $detail->category_id)->get();
            return view('livewire.web.service-detail-component', ['detail' => $detail, 'related' => $related, 'shareButtons' => $shareButtons]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', ['errorMessage' => $errorMessage]);
        }
    }
}
