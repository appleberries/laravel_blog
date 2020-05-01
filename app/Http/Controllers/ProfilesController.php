<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\User;
use Auth;
use Image;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['except' => ['viewProfile']]);
    }

    public function viewProfile($user_id){
    	$title = 'Profile';
    	$profile = Profile::where('user_id', $user_id)->firstOrFail();

    	return view('profiles.view_profile')->with('title', $title)
    									    ->with('profile', $profile);	
    }

    public function editProfile($user_id){
    	$title = 'Edit Profile';
    	$profile = Profile::where('user_id', $user_id)->firstOrFail();

    	if(auth()->user()->id !== $profile->user_id){
    		return redirect('posts/index_post')->with('error', 'Unauthorized access!');
    	}

    	return view('profiles.edit_profile')->with('title', $title)
    									    ->with('profile', $profile);
    }

    public function updateProfile(Request $request, $id){
    	$request->validate([
    		'name' => 'required|min:3|max:20',
            'picture' => 'image'
    	]);

    	$profile = Profile::where('user_id', $id)->firstOrFail();

    	if(auth()->user()->id !== $profile->user_id){
    		return redirect('posts/index_post')->with('error', 'Unauthorized access!');
    	}
    	
    	$user = User::where('id', $id)->firstOrFail();
        // For user profile picture
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/images/' . $filename));

            $profile->picture = $filename;
        }
        
    	$user->name = $request->input('name');
    	$profile->age = $request->input('age');
    	$profile->gender = $request->input('gender');
    	$profile->bio = $request->input('bio');
    	$user->save();
    	$profile->save();
    	

    	return redirect('/home')->with('success', 'Profile updated!');
    }
}
