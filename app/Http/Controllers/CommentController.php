<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Log;

class CommentController extends Controller
{
    //
    public function index(){
        $comments = Comment::all();
        return response()->json([
            'data' => $comments
        ], 200);
    }
    
    public function store(Request $request, Post $post)
    {
        //
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = $post->user_id;
        $comment->post_id = $post->id;
        Log::info($comment->content);
        Log::info($comment);
        $comment->save();
        return response()->json([
            'data' => $comment
        ], 200);
    }
}
