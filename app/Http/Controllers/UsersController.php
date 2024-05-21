<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        // $users = User::all();
        // $users = User::where('id' , 10)->get(); [colection]
        // $users = User::where('id' , 10)->first(); [objeto]
        // $user = User::findOrFail(100);
        // $user = User::where('name', request('name'))->firstOrFail();
        //$user = User::firstWhere('name', request('name'));
        return $user;
    }
}
