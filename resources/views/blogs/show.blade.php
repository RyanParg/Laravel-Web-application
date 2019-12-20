@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')

  <h3>{{$user->name}} Blogs:</h3>
  <ul>
    @foreach ($pages as $page)
      <h4><li><a href="{{ route('blogs.show_user_posts', ['user' => $user, 'page' => $page])}}">{{ $page->title }}</a></li></h4>

    @endforeach

    {{$pages->links()}}
  </ul>


  <p><a href="{{ route('blogs.index') }}">Back</button>

@endsection
