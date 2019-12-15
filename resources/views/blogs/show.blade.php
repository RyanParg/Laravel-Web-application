@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')

  <p>All Blogs:</p>
  <ul>
    @foreach ($pages as $page)
      <li><a href="{{ route('blogs.show_user_posts', ['user' => $user, 'page' => $page])}}">{{ $page->title }}</a></li>

    @endforeach
  </ul>


  <p><a href="{{ route('blogs.index') }}">Back</button>

@endsection
