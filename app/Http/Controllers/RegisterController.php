<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function show()
    {
        return view('Auth.registesr');

    }
    public function register(RegisterRequest $request)
    {
        $user=User::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        auth()->login($user);
        return redirect('/')->with('success','Account created successful');
    }
}
