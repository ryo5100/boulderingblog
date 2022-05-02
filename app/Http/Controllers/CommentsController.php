<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $postID)
    {
        $this->validate($request,
        [
        'body' => 'required'    
        ]);
        
    $comment = new Comment([ 'body' => $request->body  ]);
    $comment->user_id=Auth::id();
    $post = Post::findOrFail($postID);
    $post->comments()->save($comment);
    
    return redirect()
           ->action('PostController@show', $post->id);
    }
}
