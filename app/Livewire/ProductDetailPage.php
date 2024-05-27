<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Product Detail - VCodeDC')]
class ProductDetailPage extends Component
{
    use LivewireAlert;
    public $slug;
    public $quantity=1;

    public function addToCart($productId) {
        $total_count = CartManagement::addItemToCartWithQty(($productId));

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Added to cart!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
           ]);
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }
 
    public function increaseQty() {
        $this->quantity++;
    } 

    public function decreaseQty() {
        if ( $this->quantity > 1)
            $this->quantity--;
    } 
    public function render()
    {
       
        return view('livewire.product-detail-page', [
            'product' =>  Product::where('slug',$this->slug)->firstOrFail()
        ]);
    }
}
