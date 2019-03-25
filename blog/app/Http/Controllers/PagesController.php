<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function index(){
        return view('pages.home');
    }

    public function about(){
        return view('pages.about');
    }

    public function posts(){
        $posts = Post::orderBy('created_at','desc')->paginate('5');
        return view('pages.posts')->with('posts',$posts);
    }

    public function dashboard(){
        $posts = Post::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate('5');
        return view('pages.dashboard')->with('posts',$posts);
    }

}
