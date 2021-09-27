<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public static $rules = array(
        'content' => 'required',
        'user_id' => 'required',
        'post_id' => 'required'
    );
}
