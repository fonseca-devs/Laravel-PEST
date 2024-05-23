<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://media.licdn.com/dms/image/D4E12AQGZ7dwwMe8k1Q/article-cover_image-shrink_720_1280/0/1711667456580?e=2147483647&v=beta&t=uMyGtDeyroqMdQIXhDILp-e7GlAP5Ft90WKvuJYdclc" width="400" alt="Laravel Logo"></a></p>



## ORM-Eloquent

O ORM Eloquent é um recurso de mapeamento objeto-relacional (ORM) incluído no framework Laravel. Um ORM é uma técnica que permite aos desenvolvedores trabalhar com bancos de dados relacionais usando objetos e métodos ao invés de escrever consultas SQL diretamente.

- [Documentação database ORM](https://laravel.com/docs/10.x/eloquent).

## O que eu aprendi?

Durante o desenvolvimento, aprendi e relembrarei alguns conceitos importantes que serão úteis no dia a dia. Aqui estão alguns pontos-chave:

### 1. Model:

Ao trabalhar com modelos no Laravel, alguns conceitos e práticas importantes foram destacados:

```php
protected $table = "posts";
protected $primaryKey = "id";
protected $keyType = "string";
public $incrementing = true;
public $timestamps = true;

const CREATED_AT = "data_criacao";
const UPDATED_AT = "data_atualizacao";

protected $dateFormat = "d/m/Y";
protected $connection = 'mysql';
protected $attributes = [
    'title' => 'um comentário'
];
```

2. Busca de Registro com ORM:

Antes, eu costumava utilizar métodos como get() e first() em combinação com where() para buscar registros. No entanto, descobri uma opção mais eficiente: findOrFail().
```php
    $users = User::all();
    $users = User::where('id' , 10)->get(); 
    $users = User::where('id' , 10)->first(); 
    $user = User::findOrFail(100);
    $user = User::where('name', request('name'))->firstOrFail();
    $user = User::firstWhere('name', request('name'));
```
3. Filtros:

Ao lidar com filtros de consulta, aprendi várias técnicas úteis que ajudam a refinar resultados de busca:  -> whereNot, whereIn, orWhere
```php
        $user = $user->where('email', 'LIKE', "%{$filter}%")
                    ->whereIn('email', ['', ''])
                    ->toSQL();
        return $user;
```
Ao combinar where(), orWhere(), e funções anônimas, é possível criar consultas altamente flexíveis para atender a uma variedade de cenários de filtragem.

Esses são alguns dos principais pontos que aprendi recentemente e que pretendo aplicar no meu desenvolvimento futuramente.
```php
    $user = $user->where('name', 'like' , "%{$filter}%")
    ->orWhere(function ($query) use ($filter){
        $query->where('name', '<>', 'ursula');
        $query->where('email', 'LIKE', "%{$filter}%");
    })
    ->toSql();
```
    select * from `users` where `name` like ? or (`name` <> ? and `email` LIKE ?)

4. paginação

Ao lidar com paginação de consulta, relembrei várias técnicas úteis que ajudam a paginar resultados de busca:  -> paginate com filtros e utilizando os paramentros da url

```php
   $users = User::paginate(10);
        //{{ $users->links() }} na view
```
Podemos combinar filtros com a paginação
```php
    $filter = request('filter');
        $pages = request('perPage', 10);
        $users = $user->where('name', 'LIKE', "%{$filter}%")
            ->orWhere(function  ($query){
                $query->whereIn('email', ['ykerluke@example.com', 'paula.bogisich@example.org']);
        })->paginate($pages);


```
   
   4. Ordenação

Podemos ordenar os resutados por coluna sendo crescente ou decrescente

```php
   public function order(User $user) {
        $users = $user->orderBy('name', 'ASC')->get();
        return $users;
    }
```

 4. Create

Existe varias formas de salvar um dado no banco
# Valores Fixos
```php

  $comment = new Comment();
            $comment->user_id = 2;
            $comment->comments_type = "App\Models\Post";
            $comment->comments_id = 1;
            $comment->body = "teste lor";

            $comment->save();

```
Valores variaveis 
```php
 return $comments::create($request->all());
```
valores com relacionamento
(esse é interessante)
```php
  $user = User::find(1);
        $user->comments()->create([
            'body' => 'não conhecia essa função do ORM',
            "user_id" => $user->id
        ]);

        return Comment::get();
```
 4. update, se não exisitir cria , senão faz update
```php
 foreach ($request->ids as $id) {
            User::destroy($id);
        }

        $user->destroy($request['id']);

        return $user->get();
```

5. delete, com um desafio de deletar varios usuarios

```php
 foreach ($request->ids as $id) {
            User::destroy($id);
        }

        $user->destroy($request['id']);

        return $user->get();
```
## Conceitos adicionais

1. Comecei a usar o DebugBar e o Telescope, eu já conhecia, mas não tinha o custume de usar

2. utilizei o Tinker para rodar a factory de user

