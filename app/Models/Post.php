<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'published', 'author', 'views', 'user_id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = \Str::slug($post->title);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
