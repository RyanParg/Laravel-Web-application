@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
  <p>All Blogs:</p>
  <ul>
    @foreach ($blogs as $blog)
      <li><a href="{{ route('blogs.show', ['id' => $blog->id])}}">{{ $blog->title }}</a></li>

    @endforeach
  </ul>

  <a href="{{ route('blogs.create' )}}">Create Blog</a>
@endsection
