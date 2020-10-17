<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use DB;

class PostController extends Controller
{
    protected $limit = 3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->latestFirst()->paginate($this->limit);
        $randomPosts = DB::table('posts')
                ->select('title', 'slug', 'image', 'created_at')
                ->inRandomOrder()
                ->limit(2)
                ->get();

        return view('posts.index', compact('posts', 'randomPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with(['user', 'comments'])->where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment($slug, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:comments',
            'website' => 'required',
            'comment' => 'required'
        ]);

        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $comment->comment = $request->comment;

        $post = Post::where('slug', $slug)->first();

        $post->comments()->save($comment);
        return redirect('/posts/'.$slug.'#comment-post')->with('message', 'Message successfully..');
    }
}
