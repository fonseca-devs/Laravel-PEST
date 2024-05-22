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
    $user = $user->where('email', $email)->first();

    $user = $user->where('email', 'LIKE', "%{$filter}%")->get();
   

    $user = $user->where('email', 'LIKE', "%{$filter}%")
                    ->orwhere('name', 'Prof. Alanis Johns')
                    ->toSQL();

    //"select * from `users` where `email` LIKE ? or `name` = ?"

        $user = $user->where('email', 'LIKE', "%{$filter}%")
                    ->whereIn('email', ['', ''])
                    ->toSQL();
        return $user;
    //select * from `users` where `email` LIKE ? and `email` in (?, ?)
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

## Conceitos adicionais

1. Comecei a usar o DebugBar e o Telescope, eu já conhecia, mas não tinha o custume de usar

2. utilizei o Tinker para rodar a factory de user

