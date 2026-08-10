<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     * 低評価したユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 低評価された記事
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}