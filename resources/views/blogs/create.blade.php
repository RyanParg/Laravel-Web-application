@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')
  <form method="POST" action="{{ route('blogs.store') }}">
    @csrf
    <p>Title: <input type="text" name="title"
      value="{{ old('title') }}"></p>

    <p><select name="owner_id">
      @foreach ($owners as $owner)
        <option value="{{ $owner->id }}"
          @if($owner->id == old('owner_id'))
            selected="selected"
          @endif
        >{{ $owner->name }}</option>
      @endforeach
    </select>
  </p>


    <input type="submit" value="Submit">
    <a href="{{ route('blogs.index')}}">Cancel</a>
  </form>

@endsection
