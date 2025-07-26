<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'category',
        'author',
        'author_phone',
        'content',
        'likes',
        'status',
        'published_at'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
