<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = true;
    public $timestamps = true;

    const CREATED_AT = "data_criacao";
    const UPDATED_AT = "data_atualizacao";

    protected $dateFormat = "d/m/Y";
    protected $connection = 'mysql';
    protected $attributes = [
        'title' => 'um comentário'
    ];

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function post(){
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'comments');
    }
}
