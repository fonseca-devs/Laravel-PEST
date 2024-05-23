<?php

namespace App\Models;

use app\traits\DefaultTraits;
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



}
