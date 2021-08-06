<?php

namespace App\Repositories;

use App\Models\category;
use Illuminate\Http\Request;

class categoryRepository{

    public function getList(){

        return category::with(['products'=>function($query){
        $query->wherestatus('ACTIVE');
        }])->wherestatus('ACTIVE')->get();
    }
   
    public function getCategory($id){
        return category::whereid($id)->first();
    }
    public function create(Request $request){
        $request->validate(['name'=>'required']);
        category::create(['name'=>$request->name]);
        return redirect()->back()->with('statusSuccess','Category Successfully Created');
    }

    public function delete($id){
        $category = category::whereid($id)->first();
        $category->status ="DELETED";
        $category->save();
        return redirect()->back()->with('statusSuccess','Category Successfully Delete');
    }

    public function  update(Request $request, $id){
        $category = category::whereid($id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('statusSuccess','Category Successfully Updated');   
    }
}