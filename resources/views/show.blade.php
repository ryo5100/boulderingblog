<!DOCTYPE html>
@extends('layouts.app')
@section('content')


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    
    <body>
      <p>{{ Auth::user()->name }}</p>
      <h1>ボルダリングブログ</h1>
      <p class='edit'>[<a href='/posts/{{ $post->id }}/edit'>編集</a>]</p>
      <form action='/posts/{{ $post->id }}' id='form_delete'method='post'>
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <input type='submit' style='display:none'>
        <p class='delete'>[<span onclick='return deletePost(this);'>削除</span>]</p>
      </form>
      <div class='post'>
          <small>{{ $post->user->name }}</small>
          <h2 class='title'>{{ $post->title }}</h2>
          <p class='body'>{{ $post->body }}　</p>
          
          @if($post->image_path)
          　<img src="{{ $post->image_path }}"　width="400" height="300" > <!-- 画像を表示 -->
          　@endif          
          
          <p class='updated_at'>{{ $post->updated_at }}</p>
        
        
     </div>
      
      <div class='back'>[<a href='/'>戻る</a>]</div>
      <script>
          function deletePost(e){
              'use strict'
              if (confirm('削除すると復元できません。\n本当に削除しますか')){
                  document.getElementById('form_delete').submit();
              }
          }
      </script>
      
      
      <h4>コメントをする</h4>
      <form method='post' action='{{ action('CommentsController@store', $post->id )}}'>
        @csrf
        <p>
          <input type='text'name='body' placeholder='コメントを書き込んでください' value='{{ old('body') }}'>
          @if ($errors->has('body'))
          <span class='error'>{{ $errors->first('body')}}</span>
          @endif
        </p>
        
        <p>
          <input type='submit' value='Add comment'>
        </p>
      </form>
      <h3>Comments</h3> 
      コメント欄
      <u1>
        
        @forelse ($post->comments as $comment)
        <h4><l1>{{ $comment->body }}</l1></h4>
        @empty
        <l1>No comment</l1>
        @endforelse
      </u1>
      </body>
</html>
 
@endsection