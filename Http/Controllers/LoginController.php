<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //
    public function index()
    {
        //如果已登录，直接跳转至文章列表页
        if(Auth::check()){
            return \redirect("/posts");
        }

        return view('login.index');
    }

    public function login()
    {
        //验证
        $this->validate(\request(),[
//            'name' => 'required|string|min:3|unique:users,name',
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
            'is_remember' => 'integer'
        ]);
        //逻辑
        $user = \request(['email','password']);
        $is_remember = \request('is_remember');
        if(Auth::attempt($user,$is_remember)) {
            return redirect("/posts");
        }
        //渲染
        return Redirect::back();
    }

    public function logout()
    {
        Auth::logout();
        return \redirect('/login');
    }
}
