<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function index(){
		$title = '3PEAT';

		return view('pages.index')->with('title', $title);
	}

    public function services(){
    	$data = array(
    		'title' => 'Services',
    		'services' => ['Programming', 'Web Design', 'Scripting']
    	);

    	return view('pages.services')->with($data);
    }

    public function about(){
    	$title = 'About';

    	return view('pages.about')->with('title', $title);
    }
}
