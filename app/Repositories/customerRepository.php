<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class customerRepository{

    public function getList()
    {
        return User::paginate(20);
    }

    public function resetPassword($id){
        $user = User::whereid($id)->first();
        $password = rand(1000,10000);
        $user->password = Hash::make($password);
        $user->save();
        return redirect()->back()->wwith('statusSuccess','Password manual reset to:'.$password);
    }
}