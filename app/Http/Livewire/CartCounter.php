<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render'];
    public function render()
    {
        $cart_quantity = \Cart::getTotalQuantity();
        return view('livewire.cart-counter',['cart_quantity'=>$cart_quantity]);
    }
}
