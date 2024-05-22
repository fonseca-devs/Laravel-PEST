<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        // $users = User::get() // all();
        // $users = User::where('id' , 10)->get(); [colection]
        // $users = User::where('id' , 10)->first(); [objeto]
        // $users = User::findOrFail(100);
        // $users = User::where('name', request('name'))->firstOrFail();
        // $users = User::firstWhere('name', request('name'));

    }

    public function filtro(User $user){
        $filter = "w";
        $email = "jared.oconnell@example.net";

        // $user = $user->where('email', $email)->first();

        // $user = $user->where('email', 'LIKE', "%{$filter}%")->get();
        // -> whereNot, whereIn, orWhere

        // $user = $user->where('email', 'LIKE', "%{$filter}%")
        //                 ->orwhere('name', 'Prof. Alanis Johns')
        //                 ->toSQL();

        // //"select * from `users` where `email` LIKE ? or `name` = ?"

        //  $user = $user->where('email', 'LIKE', "%{$filter}%")
        //                 ->whereIn('email', ['', ''])
        //                 ->toSQL();
        //     return $user;
        // select * from `users` where `email` LIKE ? and `email` in (?, ?)

        // $user = $user->where('name', 'like' , "%{$filter}%")
        //     ->orWhere(function ($query) use ($filter){
        //         $query->where('name', '<>', 'ursula');
        //         $query->where('email', 'LIKE', "%{$filter}%");
        //     })
        //     ->toSql();

        // select * from `users` where `name` like ? or (`name` <> ? and `email` LIKE ?)
        return $user;
    }


}
