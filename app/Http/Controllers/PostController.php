<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incommingPost = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3']
        ]);
        
        $incommingPost['title'] = strip_tags($request['title']);
        $incommingPost['body'] = strip_tags($request['body']);
        $incommingPost['user_id'] = auth()->id();
        
        Post::create($incommingPost);
        return redirect('/');
    }


    public function showEditPost(Post $post)
    {
        return view('edit-post', ['post' => $post]);
    }


    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }

        $incommingPost = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3']
        ]);

        $incommingPost['title'] = strip_tags($incommingPost['title']);
        $incommingPost['body'] = strip_tags($incommingPost['body']);
    
        $post->update($incommingPost);
        return redirect('/');
    }


    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();
            return redirect('/');
        }

        return redirect('/');
    }
}
