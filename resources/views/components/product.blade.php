<div class="col-md-9 mt-4">    
    <div class="card">
        <div class="card-header">Product View</div>
        <div class="card-body">
    <div class="row">
       <div class="col-md-6">
           
       <img src="/{{$product->image}}" class="product_image"/>
       </div>
       <div class="col-md-6">
             <table class="table table-bordered">
                 <tbody>
                 <tr>
                     <td>
                         Name
                     </td>
                     <td>
                         {{$product->name}}
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Units
                     </td>
                     <td>
                         @if ($product->quantity =="*")
                            <b class="text-danger">Unlimited</b>
                         @else
                            <b>{{$product->quantity}}</b>  
                         @endif
                        
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Price
                     </td>
                     <td>
                       
                            <b>{{$product->currency->name}}{{$product->price}}</b>  
                       
                        
                     </td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         {{$product->description}}
                     </td>
                 </tr>

                 <tr>
                     <td colspan="2">
                     @if($product->quantity > 0 || $product->quantity =='*')
    <div class="d-flex justify-content-center">

        @if($cart->where('id',$product->id)->count())

         <a href="{{route('Cart.index')}}" class="btn btn-block btn-primary"> View cart</a>
        @else
        <form  method="POST" action="{{route('Cart.store')}}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}"/>
      <button type="submit" class="btn btn-primary">Add to cart</button>
        </form>
        @endif
      @else
         <p class="text-center text-danger"><b>Out of stock</b></p>
      @endif
                     </td>
                 </tr>
               </tbody>
             </table>
        </div>    
     </div>
</div>
</div>
</div>