<?php
namespace App\Repositories\administrator;

use App\Models\administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersRepository{

    public function getList(){

        return administrator::get();
    }

    public function create(Request $request){
        $request->validate(['name'=>'required','surname'=>'required','email'=>'required|unique:administrators','password'=>'required|confirmed']);
        $array = ['name'=>$request->name,'surname'=>$request->surname,'email'=>$request->email,'password'=>Hash::make($request->password)];
        administrator::create($array);

        return redirect()->back()->with('statusSuccess','User successfully Created');
    }

    public function delete($id){
        $admin = administrator::whereid($id)->first();
        $admin->status ="BLOCKED";
        $admin->save();
        return redirect()->back()->with('statusSuccess','User successfully Blocked');
    }

    public function active($id){
        $admin = administrator::whereid($id)->first();
        $admin->status ="ACTIVE";
        $admin->save();
        return redirect()->back()->with('statusSuccess','User successfully Activated');
    }


}