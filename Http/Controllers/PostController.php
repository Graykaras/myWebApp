<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //列表
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view("post/index", compact('posts'));
    }

    //详情
    public function show(Post $post)
    {
        return view("post/show", compact('post'));
    }

    //创建
    public function create()
    {
        return view("post/create");
    }

    //创建逻辑
    public function store()
    {
        //验证
        $this->validate(\request(),[
            'title' => 'required|string|max:100|min:2',
            'content' => 'required|string|min:2',
        ]);

        //逻辑
        $user_id = Auth::id();
        $params = array_merge(\request(['title', 'content']),compact('user_id'));
        Post::create($params);

        //渲染
        return redirect("/posts");
    }

    //编辑
    public function edit(Post $post)
    {
        return view("post/edit",compact('post'));
    }

    //更新
    public function update(Post $post)
    {
        //验证
        $this->validate(\request(),[
            'title' => 'required|string|max:100|min:2',
            'content' => 'required|string|min:2',
        ]);

        //是否有修改权限
        $this->authorize('update',$post);
        //逻辑
        $post->title = \request('title');
        $post->content = \request('content');
        $post->save();

        //渲染
        return redirect("/posts/{$post->id}");
    }

    //删除
    public function delete(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect("/posts");
    }
    //
    //上传图片
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        $data = asset('storage/' . $path);
        echo $data;
    }

}
