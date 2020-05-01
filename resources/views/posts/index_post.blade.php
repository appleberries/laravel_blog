@extends('layouts.app')

@section('content')
	<h3>{{$title}}</h3>

	@if(count($posts) > 0)
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Title</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td scope="row">{{$loop->index + 1}}</td>
						<td scope="row">
							<a href="/posts/show_post/{{$post->id}}">{{$post->title}}</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<p>There are no posts.</p>
	@endif

	{{$posts->links()}}
@endsection()