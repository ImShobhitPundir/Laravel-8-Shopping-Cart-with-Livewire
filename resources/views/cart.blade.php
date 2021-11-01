@extends('layouts.app')

@section('content')
@include('layouts.header', [
    'heading' => 'Your Cart',
    'description' => 'Products in your cart'
])  
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <livewire:cart-page />
    </div>
</div>
</div>
@livewireScripts
@endsection