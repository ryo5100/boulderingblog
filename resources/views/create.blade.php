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
        <p>{{Auth::user()->name}} </p>
        <h1>Blog Name</h1>
        <form action='/posts'method='POST'>
          {{ csrf_field() }}
          <div class='title'>
            <h2>Title</h2>
            <input type='text' name='post[title]'placeholder='タイトル' value='{{ old('post.title') }}'/>
            <P class='title_error' style='color:red'>{{ $errors->first('post.title') }}</P>
            </div>
          <div class='body'>
            <h2>Body</h2>
            <textarea name='post[body]' placeholder='今日も一日お疲れさまでした。' value='{{ old('post.body') }}'></textarea>
            <p class='body_error' style='color:red'>{{ $errors->first('post.body') }}</p>
          </div>
          <input type='submit' value='保存'>
        </form>
        <div class='back'>[<a href='/'>back]</a></div>
    </body>
</html>
@endsection