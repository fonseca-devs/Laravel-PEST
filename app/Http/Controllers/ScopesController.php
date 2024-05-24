<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ScopesController extends Controller
{

    public function localScope(){
        // $user = User::LastDays()->get();
        $user = User::between('2024-01-23', '2024-02-23')->get();
        return $user;
    }

    public function globalScope(){
        return User::get();
    }


}
