@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
  <p>All Users:</p>
  <ul>
    @foreach ($users as $user)
      <li><a href="{{ route('blogs.show', ['user' => $user])}}">{{ $user->name }}</a></li>

    @endforeach
  </ul>

  <a href="{{ route('blogs.create' )}}">Create Blog</a>
@endsection
