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
       <h1>編集画面</h1>
           <form action='/posts/{{ $post->id }}' method="POST">
               {{ csrf_field() }}
               @method('PUT')
               <div clsss='title'>
                   <h2>タイトル</h2>
                   <input type='text' name='post[title]'value='{{ $post->title }}'>
               </div>
               <div class='body'>
                   <h2>本文</h2>
                   <input type='text' name='post[body]' value='{{  $post->body  }}'>
               </div>
               <input type='submit' value='保存'>
           </form>
           <div class='back'>[<a href='/posts/{{ $post->id }}'>戻る</a>]</div>
    </body>
</html>
@endsection