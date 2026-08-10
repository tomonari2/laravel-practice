<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     * ブックマークしたユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ブックマークされた記事
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
