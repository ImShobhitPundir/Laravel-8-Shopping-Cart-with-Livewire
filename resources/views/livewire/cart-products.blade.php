<ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:250px; left:-190px;">
    <li id="cart">
        <table class="table">
            @if($cart_total)
              @foreach($cart_list as $data)
              <tr>
                  <td> <img src="{{ $data->attributes->image }}" width="30px" height="25px"> </td>
                  <td>
                      <span>{{ $data->name }}</span> </br>
                      <span class="text-warning">Qnt: {{ $data->quantity }}</span> | 
                      <span class="text-danger">Price: Rs. {{ $data->quantity*$data->price }}</span>  
                  </td>  
              </tr>
              @endforeach
              <tr>
                  <th>Total:</th>
                  <th class="text-right">Rs. {{ $cart_total }}</th>
              </tr>
              <tr>
                  <td colspan="2" style="text-align:right"> 
                      <a href="{{ route('cart') }}"><button class="btn btn-primary" type="button">View Cart</button></a>
                  </td>
              </tr>
            @else
            <tr>
              <td colspan="2">Cart is Empty </td>
            </tr>
            @endif
        </table>
      </div>
 
  </ul>