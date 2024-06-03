<?php

namespace Tests\Unit\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DefaultTraits;

class UserTest extends ModelTestCase
{
    protected function model(): Model
    {
        return new User();
    }

    protected function traits(): array
    {
        return [
            HasFactory::class,
            SoftDeletes::class,
            DefaultTraits::class
        ];
    }

    protected function cast():array
    {
        return [
            'idade' => 'string',
            'id' => 'int',
            'deleted_at' => 'datetime'
        ];
    }
}
