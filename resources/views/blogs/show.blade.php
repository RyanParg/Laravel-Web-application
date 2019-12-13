@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')
  <ul>
    <li>Name: {{ $blog->title }}</li>
  </ul>

  <form method="POST"
    action="{{ route('blogs.destroy', ['id' => $blog->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>

  <p><a href="{{ route('blogs.index') }}">Back</button>

@endsection
