@extends('layouts.app')

@section('content')
	<h3>{{$title}}</h3>
	<hr>

	<form action="/posts/update_post/{{$post->id}}" method="POST">
		@csrf
		@method('PATCH')

		<div class="form-group">
			<label for="title" class="control-label">Title</label>
			<input type="text" name="title" placeholder="Title" value="{{$post->title}}" id="title" class="form-control">
		</div>

		<div class="form-group">
			<label for="content" class="control-label">Content</label>
			<textarea name="content" id="content" class="form-control">{{$post->content}}</textarea>
		</div>
		
		<input type="submit" name="submit" value="Submit" class="btn btn-success">
		
	</form>
@endsection