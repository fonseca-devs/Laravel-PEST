<?php

namespace App\scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class createAtScope implements Scope
{
    public function apply(Builder $builder, Model $model){
        $builder->whereYear('created_at', now()->year);
    }
}
