<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4',
            'body' => 'required|string|min:4'
        ]);

        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->user_id = Auth::id();

        $post->save();
        return redirect('/posts')->with('success','Post created');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.view')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id === Auth::id()){
            return view('posts.edit')->with('post',$post);
        }else{
            return abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id === Auth::id()){

            $request->validate([
                'title' => 'required|string|min:4',
                'body' => 'required|string|min:4'
            ]);

            $post->title = $request['title'];
            $post->body = $request['body'];

            $post->save();

            return redirect('/dashboard')->with('success','Post updated');
        }else{
            return abort(404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id === Auth::id()){
            $post->delete();
            return redirect('/posts')->with('success',"Post deleted");
        }else{
            return redirect('/posts')->with('error',"Can't delete the post");
        }
    }
}
