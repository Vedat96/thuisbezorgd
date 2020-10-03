<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){

    	return view('welcome', [
    		'foo' => 'bar'
    	]);
	}
	public function users(){
		return view('users');
	}
		public function restaurants(){
		return view('restaurants');
	}

}
