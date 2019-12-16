@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')
  <form method="POST" action="{{ route('blogs.store') }}">
    @csrf
    <p>Title: <input type="text" name="title"
      value="{{ old('title') }}"></p>

      <p>Content: <input type="text" name="content"
        value="{{ old('content') }}"></p>

    <input type="submit" value="Submit">
    <a href="{{ route('blogs.edit', ['user' => Auth::user()]) }}">Cancel</a>
  </form>

@endsection
