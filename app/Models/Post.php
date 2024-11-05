<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'Posts';

    protected $casts = [
        'tags_id' => 'json',
    ];

    public function tag(): HasOne
    {
        return $this->hasOne(Tag::class, 'id', 'tags_id');
    }
}
