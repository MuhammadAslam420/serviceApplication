<?php

namespace App\Livewire\User;

use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class WishlistComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.base')]

    public function removeFromWishlist($rowId)
    {
        try{
            $item=Cart::instance('wishlist')->get($rowId);
            if (!$item) {
                $this->alert('warning', 'There is no service exist in your cart with this name', [
                    'position' => 'center',
                    'timer' => 5000,
                    'toast' => false,
                    'timerProgressBar' => true,
                ]);
            } else {
                Cart::instance('wishlist')->remove($rowId);
                $this->alert('success', 'Item has been removed from the cart successfully');
            }
        } catch (InvalidRowIDException $e) {
            // Handle the exception specific to invalid row IDs.
            $this->alert('error', $e->getMessage(), [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }catch(\Exception $e){

            $this->alert('error',$e->getMessage(),[
                'position' => 'center',
                'timer' => 5000,
                'toast' => false, 
                'timerProgressBar' => true,
            ]);

        }
    }
    public function render()
    {
        return view('livewire.user.wishlist-component');
    }
}
