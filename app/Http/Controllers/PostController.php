<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        $users=User::select('id')->get();
        return view('posts.create',['users'=>$users]);
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
            'user_id'=>'required'
        ]);
        $data['slug']=Str::slug($data['title']);
        $data['enabled']=true;
        Post::create($data);
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
        $users=User::select('id')->get();
        $post=Post::find($id);
        return view('posts.edit',['post'=>$post,'users'=>$users]);
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
            'user_id'=>'required'
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
