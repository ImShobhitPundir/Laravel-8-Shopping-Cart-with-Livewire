<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartProducts extends Component
{
    //protected $listeners = ['addToCart' => 'addCart'];
    protected $listeners = ['cart_list_updated' => 'render'];
    public function render()
    {
        $cart_list = \Cart::getContent();
        $cart_total = \Cart::getTotal();
        $data = [
            'cart_list'=>$cart_list,
            'cart_total'=>$cart_total
        ];
        return view('livewire.cart-products',$data);
    }
   
}
