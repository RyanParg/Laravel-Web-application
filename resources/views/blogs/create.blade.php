@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')
  <form method="POST" action="{{ route('blogs.store') }}">
    @csrf
    <p>Title: <input type="text" name="title"
      value="{{ old('title') }}"></p>

    <p>User Id: <input type="text" name="owner_id"
      value="{{ old('owner_id') }}"></p>

    <input type="submit" value="Submit">
    <a href="{{ route('blogs.index')}}">Cancel</a>
  </form>

@endsection
