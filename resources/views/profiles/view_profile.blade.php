@extends('layouts.app')

@section('content')
	<h3 class="align-bottom" style="display:inline; margin-right:100px;">{{$title}}</h3>
	@if(!Auth::guest())
		@if(auth()->user()->id == $profile->user_id)
			<a href="/profiles/edit_profile/{{$profile->user_id}}" class="btn btn-dark">Edit</a>
		@endif
	@endif
	<hr>

	<img src="/images/{{$profile->picture}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
	<div style="margin-bottom:10px">
		<h5 style="display: inline">Name: </h5>
		<span>{{ucfirst(trans($profile->user->name))}}</span>
	</div>
	<div style="margin-bottom:10px">
		<h5 style="display: inline">Age: </h5>
		<span>{{$profile->age}}</span>
	</div>
	<div style="margin-bottom:10px">
		<h5 style="display: inline">Gender: </h5>
		<span>{{$profile->gender}}</span>
	</div>
	<div style="margin-bottom:10px">
		<h5 style="display: inline">Bio: </h5>
		<span>{{$profile->bio}}</span>
	</div>
@endsection()