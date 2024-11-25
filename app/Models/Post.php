<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    use HasFactory;
    
    protected $table = 'Posts';

    protected $casts = [
        'tags_id' => 'json',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'post_id', 'id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id', 'post_id');
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Comment::class, 'id', 'post_id');
    }
}