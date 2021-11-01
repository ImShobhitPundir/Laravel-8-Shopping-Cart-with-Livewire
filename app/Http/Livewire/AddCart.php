<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class AddCart extends Component
{
    public $product_id;

    public function mount($product_id){
        $this->product_id = $product_id;
    }
    public function addToCart($product_id){
       // $porduct_id = 1;
        if(\Cart::get($product_id)){
            session()->flash('error_msg', 'Already in cart.');
        }else{
            $product_details = HTTP::get("https://fakestoreapi.com/products/".$product_id);
            $product_details = json_decode($product_details);

            \Cart::add(array(
                'id' => $product_id,
                'name' =>  $product_details->title,
                'price' =>  $product_details->price,
                'quantity' => 1,
                'attributes' => array(
                    'image'=>$product_details->image,
                ),
                'associatedModel' => ''
            ));

            $this->emit(event:'cart_updated');
            $this->emit(event:'cart_list_updated');
            session()->flash('success_msg', 'Added Successfully.');
        }
    }
    public function render()
    {
        return view('livewire.add-cart');
    }
}
