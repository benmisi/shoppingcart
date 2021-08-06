<?php
namespace App\Repositories\administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginRepository{

    public function Login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return redirect()->back()->with('statusError','The provided credentials do not match our records');
    }
}