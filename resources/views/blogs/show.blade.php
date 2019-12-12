@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')
  <ul>
    <li>Name: {{ $blog->name }}</li>
  </ul>
@endsection
