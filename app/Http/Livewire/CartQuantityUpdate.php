<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CartQuantityUpdate extends Component
{
    public $data = [];
    public $quantity = 0;

    public function mount($data){
        $this->product = $data;
        $this->quantity = $data['quantity'];
    }
    public function updateQuantity(){
        //here need update cart with quantity but this library add new quantity in old quantity so i remove product first & then add with new quantiy
        \Cart::remove($this->product['id']);

        $product_details = HTTP::get("https://fakestoreapi.com/products/".$this->product['id']);
        $product_details = json_decode($product_details);

        \Cart::add(array(
            'id' => $this->product['id'],
            'name' =>  $product_details->title,
            'price' =>  $product_details->price,
            'quantity' => $this->quantity,
            'attributes' => array(
                'image'=>$product_details->image,
            ),
            'associatedModel' => ''
        ));

        $this->emit(event:'cart_updated');
        $this->emit(event:'cart_list_updated');
        $this->emit(event:'cart_quanitity_updated');
    }
    public function render()
    {
        return view('livewire.cart-quantity-update');
    }
    
}
