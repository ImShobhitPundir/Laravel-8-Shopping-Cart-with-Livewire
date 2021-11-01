

    <table class="table">
        <tr>
            <th>S.No.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        @php
            $count = 1
        @endphp
        @if($cart_total)
            @foreach($cart_list as $product)
                <tr>
                    <td>{{ $count }}</td>
                    <td><img src="{{ $product->attributes->image }}" width="50px"></td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @php
                            $data = [
                                'id' => $product->id,
                                'quantity' => $product->quantity,
                            ];
                        @endphp
                        <livewire:cart-quantity-update :data="$data" :key="$product->id"/>
                    </td>
                    <td>{{ $product->quantity*$product->price }}</td>
                </tr>  
                @php
                    $count++
                @endphp      
            @endforeach
            <tr>
                <th colspan="3"></th>
                <th>Total</th>
                <th>Rs. {{ $cart_total }}</th>
            </tr>  
            <tr>
                <td colspan="4"></td>
                <th>
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Buy Now</button> 
                    </form>
                </th>
            </tr>  
        @else
            <tr>
                <td colspan="5" class="text-center">Cart is Empty</td>
            </tr>                 
        @endif

        
    </table>

