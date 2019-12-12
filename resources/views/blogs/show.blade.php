@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')
  <ul>
    <li>Name: {{ $blog->title }}</li>
  </ul>
@endsection
