<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('My Cart - VCodeDC')]
class CartPage extends Component
{
    public function render()
    {
        return view('livewire.cart-page');
    }
}
