@extends('layouts.app')

@section('content')
	{{-- @if(!Auth::guest())
	@if(auth()->user()->id == $post->user_id) --}}
	<h3>{{$post->title}}</h3>
	<p>{{$post->content}}</p>
	<small>Created on {{$post->created_at}} by: <a href="/profiles/view_profile/{{$post->user->id}}">{{ucfirst(trans($post->user->name))}}</a></small>
	{{-- @endif
	@endif --}}
@endsection