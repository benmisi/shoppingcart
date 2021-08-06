<?php
namespace App\Repositories;

use App\Models\products;
use Illuminate\Http\Request;

class productsRepository{

    public function getList(){
        return products::with('currency','category')->wherestatus('ACTIVE')->get();
    }

    public function getProduct($id){

        return products::with('currency','category')->whereid($id)->wherestatus('ACTIVE')->first();
    }

    public function getProductsByCategory($id){
        return products::with('currency','category')->wherestatus('ACTIVE')->wherecategory_id($id)->wherestatus('ACTIVE')->get();   
    }

    public function create(Request $request){
        $request->validate(['name'=>'required','description'=>'required','category'=>'required','price'=>'required','currency'=>'required','quantity'=>'required']);
       $path = $request->file('image')->store('products','publicFile');
        products::create(['name'=>$request->name,'description'=>$request->description,'category_id'=>$request->category,'price'=>$request->price,'currency_id'=>$request->currency,'quantity'=>$request->quantity,'image'=>$path]);
        return redirect()->back()->with('statusSuccess','Product Successfully Created');

    }

    public function update(Request $request,$id){
        $request->validate(['name'=>'required','description'=>'required','category'=>'required','price'=>'required','currency'=>'required','quantity'=>'required']);
        $product = products::whereid($id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect()->back()->with('statusSuccess','Product Successfully Updated');

    }

    public function delete($id){
        $product = products::whereid($id)->first();
        $product->status ="DELETED";
        $product->save();
        return redirect()->back()->with('statusSuccess','Product Successfully Deleted');
    }


}