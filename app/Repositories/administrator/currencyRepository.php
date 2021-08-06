<?php
namespace App\Repositories\administrator;

use App\Models\currency;
use Illuminate\Http\Request;

class currencyRepository{
    public function getList(){
        return currency::get();
    }

    public function create(Request $request){
        $request->validate(['name'=>'required|unique:currencies,name']);

        currency::create(['name'=>$request->name]);
        return redirect()->back()->with('statusSuccess','Currency Successfully Created');
    }

    public function delete($id){
        $currency = currency::whereid($id)->first();
        $currency->status ='DELETED';
        $currency->save();
        return redirect()->back()->with('statusSuccess','Currency Successfully Deleted');
    }

    public function update(Request $request,$id){
        $currency = currency::whereid($id)->first();
        $currency->name = $request->name;
        $currency->save();
        return redirect()->back()->with('statusSuccess','Currency Successfully Updated');
    }
}