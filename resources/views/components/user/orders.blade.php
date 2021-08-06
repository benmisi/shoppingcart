
<table  class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Order Number</th>
            <th></th>
        </tr>
    </thead>
@forelse ($orders as $order )
 <tr>
    <td>
        {{$order->created_at}}
    </td>
    <td>
         {{$order->invoicenumber}}
    </td>
    <td>
        @if ($type=="view")
        <a href="{{route('Orders.show',$order->uuid)}}" class="btn btn-sm btn-primary">View</a>   

        @elseif ($type=="track")
        <a href="{{route('Tracking.show',$order->uuid)}}" class="btn btn-sm btn-primary">track order</a>   
        @endif
       
    </td>
 </tr>
    
 
@empty
    <tr><td colspan="3" class="text-center text-danger">No order as yet</td></tr>
@endforelse
</table>
