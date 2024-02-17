<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:100',
            'body'=>'required|string',
            'published_at'=>'required|date',
        ]);
        $data['slug']=Str::slug($data['title']);
        $data['enabled']=true;
        $data['user_id']=Auth::user()['id'];
        $post = Post::create($data);
        event(new PostCreated($post));
        return redirect(url('/posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        if($post['user_id']==Auth::user()['id']){

            return view('posts.edit',['post'=>$post]);
        }
        return redirect(url('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title'=>'required|string|max:100',
            'body'=>'required|string',
            'published_at'=>'required|date',

        ]);
        $post=Post::findOrFail($id);
        $data['slug']=Str::slug($data['title']);
        $data['enabled']=true;
        $post->update($data);
        return redirect(url('/posts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post= Post::findOrFail($id);
        $post->delete();
        return redirect(url('/posts'));
    }
}
