@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')

  @if($errors->any())
    <div>
      Errors:
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>

        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
    @csrf
    <p>Title: <input type="text" name="title"
      value="{{ old('title') }}"></p>

    <p>Content: <input type="text" name="content"
      value="{{ old('content') }}"></p>

    <p>Tags: <input type="text" name="tag"
        value="{{ old('tag') }}">

        <input type="text" name="tag1"
            value="{{ old('tag1') }}">

        <input type="text" name="tag2"
            value="{{ old('tag2') }}"></p>

    <p>Image: <input type="file" name="image"></p>

    <input type="submit" value="Submit">


    <a href="{{ route('blogs.edit', ['user' => Auth::user()]) }}">Cancel</a>
  </form>

@endsection
