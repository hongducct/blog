<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    // Các cột có thể được gán giá trị (fillable)
    protected $fillable = [
        'user_id', 'date', 'content', 'emotion',
    ];

    // Định nghĩa quan hệ với User (nếu cần)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
