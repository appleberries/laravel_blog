@extends('layouts.app')

@section('content')
	<h3>{{$title}}</h3>

	<ul class="list-group">
		@foreach($services as $service)
			<li class="list-group-item">{{$service}}</li>
		@endforeach
	</ul>
@endsection