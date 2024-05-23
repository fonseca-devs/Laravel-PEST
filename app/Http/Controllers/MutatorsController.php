<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MutatorsController extends Controller
{

    public function index()
    {
        $user = User::first();

        return $user->name_and_email;
    }
}
