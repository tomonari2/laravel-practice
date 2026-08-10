<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
    ];

    /**
     * 投稿者
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * カテゴリー
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * コメント
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * いいね
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * 低評価
     */
    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    /**
     * ブックマーク
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
