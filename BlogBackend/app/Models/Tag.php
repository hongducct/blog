<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name',
    ];

    // Mối quan hệ với Post thông qua bảng trung gian 'blog_tag'
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog_tag');
    }
}
