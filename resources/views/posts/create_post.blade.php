@extends('layouts.app')

@section('content')
	<h3>{{$title}}</h3>
	<hr>

	<form action="/posts/store_post" method="POST">
		@csrf

		<div class="form-group">
			<label for="title" class="control-label">Title</label>
			<input type="text" name="title" placeholder="Title" id="title" class="form-control">
		</div>

		<div class="form-group">
			<label for="content" class="control-label">Content</label>
			<textarea name="content" id="content" class="form-control"></textarea>
		</div>
		
		<input type="submit" name="submit" value="Submit" class="btn btn-success">
	</form>
@endsection