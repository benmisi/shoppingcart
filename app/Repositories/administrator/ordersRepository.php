<?php 
namespace App\Repositories\administrator;

use App\Models\delivery;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ordersRepository{
    public function getList(){

        return orders::get();
    }

    public function getOrders_By_Status($status){
        return orders::with('user','items','receipts')->wherestatus($status)->get();
    }
    public function getOrder($uuid){
        return orders::with('user','items','receipts')->whereuuid($uuid)->first();
    }

    public function updateOrder(Request $request){
        $request->validate(['name'=>'required','date'=>'required','time'=>'required','natid'=>'required']);
        $order = orders::whereid($request->id)->first();
        if(!is_null($order)){
           delivery::create(['receiver'=>$request->name,'receipt_date'=>$request->date,'receipt_time'=>$request->time,'order_id'=>$request->id,'natid'=>$request->natid,'delivered_by'=>Auth::guard('admin')->user()->id]);
           $order->status = 'DELIVERED';
           $order->save();
           return redirect()->back()->with('statusSuccess','Order successfully delivered');
        }
        else{
            return redirect()->back()->with('statusError','Order not found');
        }
    }
}