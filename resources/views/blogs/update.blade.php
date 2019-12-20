@extends('layouts.app')

@section('title', 'Update Page')

@section('content')

  <form method="POST" action="{{ route('blogs.storeUpdate',['user'=>$page->user,'page'=>$page]) }}">
    @csrf

    <p>Title:</p>
     <textarea type="text" name="title">
      {{ $page->title }}</textarea>

      <p>Content: </p>
      <textarea type="text" name="content"
        >{{ $page->content }}</textarea>
    <br>
    <p><input type="submit" value="Submit"></p>

    <a href="{{ route('blogs.edit', ['user' => Auth::user()]) }}">Cancel</a>
  </form>


  <form method="POST"
  action="{{ route('blogs.destroy', ['user' => $page->user, 'page' => $page]) }}">
  @csrf
  @method('DELETE')
  <br>
  <button type="submit">Delete</button>
</form>

@endsection
