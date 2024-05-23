<?php

namespace App\Models;

use App\Traits\DefaultTraits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes, DefaultTraits;

    protected $fillable = [
        'name',
        'email',
        'idade'
    ];

    protected $casts = [
        'idade' => 'string'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }
}
