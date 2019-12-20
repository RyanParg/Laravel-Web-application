@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
  
  <h3>All Users:</h3>
  <ul class="container">
    @foreach ($users as $user)
      <h4><li><a href="{{ route('blogs.show', ['user' => $user])}}">{{ $user->name }}</a></li></h4>

    @endforeach
    {{ $users->links()}}

  </ul>
@endsection
