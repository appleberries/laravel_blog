<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Validator;

use Illuminate\Http\Request;


class PostsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['except' => ['indexPost', 'showPost']]);
    }

    public function createPost(){
    	$title = 'Create Post';

    	return view('posts.create_post')->with('title', $title);
    }

    public function storePost(Request $request){
    	$request->validate([
    		'title' => 'required|min:3|max:20',
    		'content' => 'required|min:5|max:100'
    	]);

    	$post = new Post();
    	$post->title = $request->input('title');
    	$post->content = $request->input('content');
    	$post->user_id = auth()->user()->id;
    	$post->save();

    	return redirect('/posts/index_post')->with('success', 'Post created!');
    }

    public function indexPost(){
    	$title = 'Posts';
    	$posts = Post::orderBy('created_at', 'asc')->paginate(5);

    	return view('posts.index_post')->with('title', $title)
    								   ->with('posts', $posts);
    }

    public function showPost($id){
   		$post = Post::find($id);

   		return view('posts.show_post')->with('post', $post);
    }

    public function editPost($id){
    	$title = 'Edit Post';
    	$post = Post::find($id);

    	if(auth()->user()->id !== $post->user_id){
    		return redirect('/posts/index_post')->with('error', 'Unauthorized access');
    	}

    	return view('posts.edit_post')->with('title', $title)
    								  ->with('post', $post);
    }

    public function updatePost(Request $request, $id){
    	$request->validate([
    		'title' => 'required|min:3|max:20',
    		'content' => 'required|min:5|max:100'
    	]);

    	$post = Post::find($id);

    	if(auth()->user()->id !== $post->user_id){
    		return redirect('/posts/index_post')->with('error', 'Unauthorized access');
    	}

    	$post->title = $request->input('title');
    	$post->content = $request->input('content');
    	$post->save();

    	return redirect('/posts/index_post')->with('success', 'Post edited!');
    }

    public function deletePost($id){
    	$post = Post::find($id);

    	if(auth()->user()->id !== $post->user_id){
    		return redirect('/posts/index_post')->with('error', 'Unauthorized access');
    	}
    	
    	$post->delete();

    	return redirect('/posts/index_post')->with('success', 'Post deleted!');
    }
}
