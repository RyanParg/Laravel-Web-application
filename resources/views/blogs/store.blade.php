@extends('layouts.app')

@section('title', 'Store BLogs')

@section('content')
  <p>All Blogs:</p>
  <ul>
    @foreach ($users as $user)
      <li><a href="{{ route('blogs.show', ['id' => $user->id])}}">{{ $blog->name }}</a></li>

    @endforeach
  </ul>

  <a href="{{  route('blogs.edit', ['user' => Auth::user()]) }}">Create Blog</a>
@endsection
