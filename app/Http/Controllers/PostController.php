<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Storage;


class PostController extends Controller
{
    public function add()
    {
        return view('create');
    }
    
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);
         return view('index',['posts' => $post]);
         
    }
    public function show(Post $post)
    {
        $posts = Post::all();
         
        return view('show')->with(['post' => $post]);
    }
   
    public function create(Request $request)
    {
        return view('create');
    }
   
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $input +=['user_id' => $request->user()->id];
        $post->fill($input);
        
        
        $form = $request->all();
        $image = $request->file('image');//S3にアップロード開始
        $path = Storage::disk('s3')->putFile('boimage', $image, 'public');//バケットの'boimage'フォルダへアップロード
        $post->image_path = Storage::disk('s3')->url($path);//アップロードした画像のフルパスを取得
        $post->save();
        return redirect('posts/create');
        
     
    }
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    public function update(Request $request,Post $post)
    {
        $input = $request['post'];
        $input_post = ['user_id' => $request->user()->id]; 
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}

