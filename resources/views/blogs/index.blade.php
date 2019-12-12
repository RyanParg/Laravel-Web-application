@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
  <p>All Blogs:</p>
  <ul>
    @foreach ($blogs as $blog)
      <li>{{ $blog->title }}</li>

    @endforeach
  </ul>

@endsection
