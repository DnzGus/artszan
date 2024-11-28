<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'followers';

    public function followUser(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'follows_id');
    }
    
}
