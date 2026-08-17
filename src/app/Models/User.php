<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'sub',
        'name',
    ];
    /** * 投稿 */ 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    /** * コメント */ 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    /** * いいね */ 
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    /** * 低評価 */ 
    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }
    /** * ブックマーク */ 
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    /** * 自分がフォローしているユーザー */ 
    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
    /** * 自分をフォローしているユーザー */ 
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }
}
