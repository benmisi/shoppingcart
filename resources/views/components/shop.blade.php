<div class="col-md-9">

         <div class="row">
           @if (count($products)>0)             
         
             @forelse ($products as $product )
   
              <div class="col-md-4">
              <div class="card mt-4 text-center">
  <img src="/{{$product->image}}"  class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->currency->name}}{{$product->price}}</p>
    @if($product->quantity > 0 || $product->quantity =='*')
    <div class="d-flex justify-content-center">
    <a href="{{route('shop.product',$product->id)}}" class="btn btn-secondary mr-1"> View Product</a>
        @if($cart->where('id',$product->id)->count())

         <a href="{{route('Cart.index')}}" class="btn btn-success"> View cart</a>
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
</div>
  </div>
</div>
              </div>   
             @empty
  
             @endforelse

             @else
             <div class="col-md-12">
             <div class="alert alert-danger text-center" role="alert">
              No products found as yet
            </div>  
             </div>
             @endif
</div>
       
</div>