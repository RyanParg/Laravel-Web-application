@extends('layouts.app')

@section('title', 'Update Page')

@section('content')

  <form method="POST" action="{{ route('blogs.storeUpdate',['page'=>$page]) }}">
    @csrf

    <p>Title: <input type="text" name="title"
      value="{{ $page->title }}"></p>

      <p>Content: <input type="text" name="content"
        value="{{ $page->content }}"></p>

    <input type="submit" value="Submit">
    <a href="{{ route('blogs.edit', ['user' => Auth::user()]) }}">Cancel</a>
  </form>

@endsection
