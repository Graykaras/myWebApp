<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index');
    }

    public function register()
    {
        //验证
        $this->validate(\request(),[
            'name' => 'required|string|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6|max:10|confirmed'
        ]);
        //逻辑
        $name = \request('name');
        $email = \request('email');
        $password = bcrypt(\request('password'));
        $user = User::create(compact('name','email','password'));

        //渲染
        return redirect("/login");
    }
}
