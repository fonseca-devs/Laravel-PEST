<?php

namespace tests\Unit\App\Models;


use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

abstract class ModelTestCase extends TestCase {

    abstract protected function model(): Model;
    abstract protected function traits(): array;
    abstract protected function cast(): array;

    public function test_traits(){
        $expectedTraits = array_keys(class_uses($this->model()));

        $this->assertEquals($expectedTraits, $this->traits());
    }

    public function test_cast(){
        $expectedCast = $this->model()->getCasts();

        $this->assertEquals($expectedCast, $this->cast());
    }

}
