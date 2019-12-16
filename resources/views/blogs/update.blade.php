@extends('layouts.app')

@section('title', 'Update Page')

@section('content')

  <form method="POST" action="{{ route('blogs.storeUpdate',['user'=>$page->user,'page'=>$page]) }}">
    @csrf

    <p>Title: <input type="text" name="title"
      value="{{ $page->title }}"></p>

      <p>Content: <input type="text" name="content"
        value="{{ $page->content }}"></p>

    <input type="submit" value="Submit">
    <a href="{{ route('blogs.edit', ['user' => Auth::user()]) }}">Cancel</a>
  </form>


  <form method="POST"
  action="{{ route('blogs.destroy', ['user' => $page->user, 'page' => $page]) }}">
  @csrf
  @method('DELETE')
  <button type="submit">Delete</button>
</form>

@endsection
