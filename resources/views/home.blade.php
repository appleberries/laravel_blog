@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create_post" class="btn btn-primary">Create Post</a>
                    <br>
                    <br>

                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td scope="row">{{$loop->index + 1}}</td>
                                        <td scope="row">{{$post->title}}</td>
                                        <td>
                                            <a style="vertical-align: text-bottom;" href="/posts/edit_post/{{$post->id}}" class="btn btn-dark">Edit</a>
                                        </td>
                                        <td>
                                            <form action="/posts/delete_post/{{$post->id}}" method="POST" class="float-right">
                                                @csrf
                                                @method('DELETE')

                                                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You don't have a post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
