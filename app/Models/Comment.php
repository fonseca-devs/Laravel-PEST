<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'user_id', 'comments_id', 'comments_type'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
