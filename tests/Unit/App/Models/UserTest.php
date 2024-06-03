<?php

namespace Tests\Unit\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DefaultTraits;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function model(): Model
    {
        return new User();
    }

   //teste da traits do User
    public function teste_traits(): void
    {
        //verifica quais traits estão sendo utilizadas (fullPath)
        $traitsFullPath = class_uses($this->model());

        //verifica quais traits estão sendo utilizando (keys)

        $traits = array_keys(class_uses($this->model()));

        $expectedTraits = [
            HasFactory::class,
            SoftDeletes::class,
            DefaultTraits::class
        ];

        $this->assertEquals($expectedTraits, $traits);
    }
}
