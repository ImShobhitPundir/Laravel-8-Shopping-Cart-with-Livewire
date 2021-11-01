<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    protected $listeners = ['cart_quanitity_updated' => 'update'];

    public function mount(){
        $this->cart_list = \Cart::getContent();
        $this->cart_total = \Cart::getTotal();
        //$this->cart_quantity = \Cart::getTotalQuantity();
    }
    public function update(){
        $this->mount();
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
