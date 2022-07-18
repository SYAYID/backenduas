<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // get all posts
    public function index()
    {
        return Post::all();
    }

    public function myPost($id)
    {
        return Post::where('user_id', $id)->get();
    }

    public function find($id)
    {
        return Post::where('id', $id)->get();
    }

    public function search($title)
    {
        return Post::where('name', 'like', '%' . $title . '%')->get();
    }

    // create post
    public function store()
    {
        request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'prodi' => 'required',
            'nim' => 'required',
            'alamat' => 'required'
        ]);

        return Post::create([
            'user_id' => request('user_id'),
            'name' => request('name'),
            'prodi' => request('prodi'),
            'nim' => request('nim'),
            'alamat' => request('alamat')
        ]);
    }

    // update post
    public function update(Post $post)
    {
        request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'prodi' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
        ]);

        $post->update([
            'user_id' => request('user_id'),
            'name' => request('name'),
            'prodi' => request('prodi'),
            'nim' => request('nim'),
            'alamat' => request('alamat'),
        ]);
    }

    // delete post
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
