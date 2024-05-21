<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://media.licdn.com/dms/image/D4E12AQGZ7dwwMe8k1Q/article-cover_image-shrink_720_1280/0/1711667456580?e=2147483647&v=beta&t=uMyGtDeyroqMdQIXhDILp-e7GlAP5Ft90WKvuJYdclc" width="400" alt="Laravel Logo"></a></p>



## ORM-Eloquent

O ORM Eloquent é um recurso de mapeamento objeto-relacional (ORM) incluído no framework Laravel. Um ORM é uma técnica que permite aos desenvolvedores trabalhar com bancos de dados relacionais usando objetos e métodos ao invés de escrever consultas SQL diretamente.

- [Documentação database ORM](https://laravel.com/docs/10.x/eloquent).

## O que eu aprendi?

1. Model:
    Relembrei alguns conceitos de Model e aprendi algumas funções que seria muito util no dia a dia , mas eu não tinha conhecimento


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

2. Busca de Registro com ORM , eu sempre utilizei o Where com get() e first() com validação caso não encontre, mas com o FindOrFail, vai otimizar minhas funçoes

    $users = User::all();
    $users = User::where('id' , 10)->get(); 
    $users = User::where('id' , 10)->first(); 
    $user = User::findOrFail(100);
    $user = User::where('name', request('name'))->firstOrFail();
    $user = User::firstWhere('name', request('name'));

## Conceitos adicionais

1. Comecei a usar o DebugBar e o Telescope, eu já conhecia, mas não tinha o custume de usar

2. utilizei o Tinker para rodar a factory de user

