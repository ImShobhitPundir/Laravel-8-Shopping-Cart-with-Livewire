
 @if (session()->has('success_msg'))
 <div class="alert alert-success">
     {{ session('success_msg') }}
 </div>
@endif
@if (session()->has('error_msg'))
 <div class="alert alert-danger">
     {{ session('error_msg') }}
 </div>
@endif
<button type="submit" class="btn btn-sm btn-primary" wire:click="addToCart({{$product_id}})" >Add To Cart</button>