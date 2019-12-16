@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')

<h1>Your Blog Pages</h1>

<ul>
  @foreach ($pages as $page)
    <li><a href="{{ route('blogs.show_user_posts', ['user' => $user, 'page' => $page])}}">{{ $page->title }}</a></li>

  @endforeach
</ul>

@endsection
