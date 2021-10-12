<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public static $rules = array(
        'post' => 'required',
        'user_id' => 'required'
    );

    public static function likeCount($post_id){
        // postのid渡してカウント取得
        $count = self::find($post_id)->likes()->count();
        return $count;
    }

    //public function isLiked($user_id){
    //    return $this->likes()->where('user_id', $user_id)->exists();
    //}
}
