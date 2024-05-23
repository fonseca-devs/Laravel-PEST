<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $users = User::firstWhere('name', request('name'));
        return $users;

    }
//eu poderia fazer um construct nesse $user para não ficar repetindo , mas como já esta em andamento deixei dessa forma
    public function filter(User $user){
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

        $user = $user->where('name', 'like' , "%{$filter}%")
            ->orWhere(function ($query) use ($filter){
                $query->where('name', '<>', 'ursula');
                $query->where('email', 'LIKE', "%{$filter}%");
            })
            ->get();

        // select * from `users` where `name` like ? or (`name` <> ? and `email` LIKE ?)
        return $user;
    }

    public function page(User $user){
        //$users = User::paginate(10);
        // {{ $users->links() }} na view

        // outro exemplo
        $filter = request('filter');
        $pages = request('perPage', 10);
        $users = $user->where('name', 'LIKE', "%{$filter}%")
            ->orWhere(function  ($query){
                $query->whereIn('email', ['ykerluke@example.com', 'paula.bogisich@example.org']);
        })->paginate($pages);

        //localhost:8000/paginacao?filter=o&page=2&perPage=30
        return view('paginate', compact('users'));
    }

    public function order(User $user) {
        $users = $user->orderBy('name', 'ASC')->get();
        return $users;
    }

    public function store(Request $request) {
        //pra variar
            // $comment = new Comment();
            // $comment->user_id = 2;
            // $comment->comments_type = "App\Models\Post";
            // $comment->comments_id = 1;
            // $comment->body = "teste lor";

            // $comment->save();

            // $users = Comment::get();

            // return $users;

        // create

            // $comments = new Comment();

            // $save = $comments::create($request->all());
            // return $save;

        // esse aqui é mt interessante

        $user = User::find(1);
        $user->comments()->create([
            'body' => 'não conhecia essa função do ORM',
            "user_id" => $user->id
        ]);

        return Comment::get();

    }

    public function update(request $request) {
        if(User::find($request['id']) == null)
           return User::create($request->all());

        $user = User::find($request['id']);
        // $user->name = $request['name'];
        // $user->save();

        //com update

        $user->update($request->all());
        return $user;

    }

    public function delete(User $user, Request $request) {

        // $user = $user->where('id', $request['id'])->first();

        // if(!$user)
        //     return "usuario não existe";

        // $user->delete();

        //destroy(com um desafio de deletar mais de um usuario)

        foreach ($request->ids as $id) {
            User::destroy($id);
        }

        $user->destroy($request['id']);

        return $user->get();

    }
}
