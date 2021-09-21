<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Log;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return response()->json([
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->post = $request->post;
        $post->user_id = $request->user_id;
        Log::info($post);
        $post->save();
        return response()->json([
            'data' => $post
        ], 200);
    }

    public function destroy(Post $post)
    {
        //
        $post = Post::find($post->id);
        $post->delete();
        return response()->json(null, 200);
    }
}
