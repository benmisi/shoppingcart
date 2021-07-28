<div class="col-md-6">
      <h3>Your Order</h3>
      <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Product</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($cart as $ct )
             <tr>
                 <td>{{$ct->name}} * {{$ct->qty}}</td>
                 <td class="text-right">
                 {{$ct->options->currency}}{{$ct->qty * $ct->price}}
                 </td>
             </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center text-danger">No Products in Cart</td>
            </tr>
            @endforelse
            <tr><td><b>Subtotal</b></td><td class="text-right"><b>{{$cart->first()->options->currency}}{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</b></td></tr>
                          <tr><td><b>Total</b></td><td class="text-right"><b>{{$cart->first()->options->currency}}{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</b></td></tr>
                       
            </tbody>

       </table>

       <div class="mt-4">
           <div class="card">
               <div class="card-body">
                   <img src="/img/gateway.png"/>
                   <p class="mt-2"><b>We are integrated to PAYNOW a secure payment gate that allows you to pay using VISA,MASTER CARD, ECOCASG,ONEMONEY & TELECASH</b></p>
               </div>
               <div class="card-footer">
                   <button type="submit" class="btn btn-block btn-primary">Place Order</button>
               </div>
           </div>

       </div>
      </div>