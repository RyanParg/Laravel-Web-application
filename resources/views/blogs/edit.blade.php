
@extends('layouts.app')

@section('title', 'Blog Details')

@section('content')

<h1>Your Blog Pages</h1>

<ul>
  @foreach ($pages as $page)
    <li><a href="{{ route('blogs.update', ['user' => $user, 'page' => $page])}}">{{ $page->title }}</a>
      Page Views: {{$numViews->where('page_id', $page->id)->count()}},
      Views Today: {{App\PageView::whereDate('created_at', Carbon\Carbon::today())->where('page_id', $page->id)->count()}}
      Comments: {{$page->comments->count()}}
      Comments Today: {{App\Comment::whereDate('created_at', Carbon\Carbon::today())->where('page_id', $page->id)->count()}}
    </li>
  @endforeach

  {{$pages->links()}}
</ul>

<a href="{{ route('blogs.create' )}}">Create Blog</a>


@endsection
