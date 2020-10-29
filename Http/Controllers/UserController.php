<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function setting()
    {
        $user = Auth::user();
        return view('user.setting', compact('user'));
    }

    public function settingStore(Request $request)
    {
        //验证
        $this->validate(\request(),[
            'name' => 'required|string|min:3',
        ]);

        //逻辑
        $name = \request('name');
        $user = Auth::user();
        if($name != $user->name){
            if(User::where('name',$name)->count != 0){//如果用户修改的用户名已被注册了
                return back()->withErrors('用户名已被注册');
            }
            $user->name = $name;
        }

        if($request->file('avatar')){
            $path = $request->file('avatar')->storePublicly($user->id);
            $user->avatar = asset('storage/'.$path);
        }

        $user->save();

        //渲染
        return redirect("/user/me/setting");
    }
}
