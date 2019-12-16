@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')

<h1>Your Blog Pages</h1>

<ul>
  @foreach ($pages as $page)
    <li><a href="{{ route('blogs.update', ['user' => $user, 'page' => $page])}}">{{ $page->title }}</a></li>

  @endforeach
</ul>

<a href="{{ route('blogs.create' )}}">Create Blog</a>


@endsection
