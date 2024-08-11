<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::paginate(),
        ]);
    }

    public function create()
    {
        $post = new Post;

        return view('posts.form', compact('post'));
    }

    public function store(StorePostRequest $request)
    {
        auth()->user()->posts()->create($request->validated());

        return redirect()->route('posts.index');
    }

    public function edit(Request $request, Post $post)
    {
        return view('posts.form', [
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('posts.show', $post);
    }

    public function show(Request $request, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function destroy(Request $request, Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
