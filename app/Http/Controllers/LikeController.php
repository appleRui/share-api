<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Log;

class LikeController extends Controller
{
    //
    public function store(Request $request){
        $like = new Like();
        $like->user_id = $request->user_id;
        $like->post_id = $request->post_id;
        $like->save();
        $likes_count = Post::likeCount($like->post_id);
        $data = ['result' => true, 'like_count' => $likes_count];
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function destroy(Request $request){
        $like = Like::where([['post_id', $request->post_id], ['user_id', $request->user_id]])->first();
        $like->delete();
        $likes_count = Post::likeCount($request->post_id);
        $data = ['result' => false, 'like_count' => $likes_count];
        return response()->json([
            'data' => $data
        ], 200);
    }


    public function hasLike(Request $request){
        $like = Like::where([['post_id', $request->post_id], ['user_id', $request->user_id]])->exists();
        if($like){
            $res = true;
        }else{
            $res = false;
        }
        return response()->json([
            'result' => $res
        ], 200);
    }
}
