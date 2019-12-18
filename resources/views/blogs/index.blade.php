@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
  <p>All Users:</p>
  <ul>
    @foreach ($users as $user)
      <li><a href="{{ route('blogs.show', ['user' => $user])}}">{{ $user->name }}</a></li>

    @endforeach
    {{ $users->links()}}

  </ul>
@endsection
