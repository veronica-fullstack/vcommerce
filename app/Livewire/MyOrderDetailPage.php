<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('My Order Detail - VCodeDC')]
class MyOrderDetailPage extends Component
{
    public function render()
    {
        return view('livewire.my-order-detail-page');
    }
}
