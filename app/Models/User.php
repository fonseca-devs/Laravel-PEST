<?php

namespace App\Models;

use App\scopes\createAtScope;
use App\Traits\DefaultTraits;
use Carbon\Carbon;
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

    public function scopeLastDays($query){
        return $this->whereDate('created_at', '>=', now()->subDays(4))
        ->whereDate('created_at', '<=' , now()->subDays(1));
    }

    public function scopeBetween($query, $firstDate, $lastDate){
        $firstDate = Carbon::make($firstDate)->format('Y-m-d');
        $lastDate = Carbon::make($lastDate)->format('Y-m-d');
        return $this->whereDate('created_at', '>=', now()->subDays(4))
        ->whereDate('created_at', '<=' , now()->subDays(1));

    }

    protected static function booted()
    {
        // static::addGlobalScope('year', function (Builder $builder) {
        //     $builder->whereYear('created_at', now()->subDays(1));
        // });

        static::addGlobalScope(new createAtScope);
    }
    }
