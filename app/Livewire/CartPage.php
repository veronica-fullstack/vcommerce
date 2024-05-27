<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('My Cart - VCodeDC')]
class CartPage extends Component
{
    use LivewireAlert;

    public $cart_items = [];
    public $grand_total;

    
    public function increaseQty($product_id) {
        $this->cart_items = CartManagement::incrementQuantityToCartItems($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    } 

    public function decreaseQty($product_id) {
        $this->cart_items = CartManagement::decrementQuantityToCartItems($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    } 

    public function mount() {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }
 
    public function removeItem($product_id) {
        $this->cart_items = CartManagement::removeCartItems($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);

        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);

    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
