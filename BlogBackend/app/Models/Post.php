<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    // Mối quan hệ với Tag thông qua bảng trung gian 'blog_tag'
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
}
