<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        //$products = json_decode(file_get_contents('https://fakestoreapi.com/products'), true);
        $products = HTTP::get("https://fakestoreapi.com/products");
        $products = json_decode($products);
        $cart_list = \Cart::getContent();
        $cart_total = \Cart::getTotal();
        $cart_quantity = \Cart::getTotalQuantity();
        $data = [
            'products' => $products,
            'cart_list'=>$cart_list,
            'cart_total'=>$cart_total,
            'cart_quantity'=>$cart_quantity
        ];
        return view('home',$data);
    }
    public function cart(){
        return view('cart'); 
    }

    public function checkout(Request $request){
        \Cart::clear();
        $request->session()->flash('status','Payment is Processed');
        return redirect('/home');
    }  
   
}
