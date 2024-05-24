<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\scopes\createAtScope;
use Illuminate\Http\Request;

class ScopesController extends Controller
{

    public function localScope(){
        // $user = User::LastDays()->get();
        $user = User::between('2024-01-23', '2024-02-23')->get();
        return $user;
    }

    public function globalScope(){
        // return User::withoutGlobalScope('year')->get();
        return User::withoutGlobalScope(createAtScope::class)->get();
    }

    public function observer(User $user) {
        $user = $user::create([
            "name" => "bruno",
            "email" => "k@gmail.com"
        ]);
        return $user;
    }


}
