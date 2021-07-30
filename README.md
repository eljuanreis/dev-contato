<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Ideia do projeto
A ideia é criar um meio de contato via site (formulário) e poder responder esse email pelo próprio site através de uma painel administrativo. Em conjunto, o administrador ser notificado no email administrativo quando o usuário enviar uma nova mensagem pelo site - podendo responder ela pelo site - No fim, o usuário receber a resposta via Email.


## Progresso
35%
Falta: Melhoria do front-end; Verificar se o usuário está floodando formulários com base no IP; Trabalhar no painel administrativo; Melhorar os Markdown Emails; Corrigir paginação e melhorar o visual dela.

## Como rodar o projeto:
- Requisitos: Composer/Laravel 8/PHP (>= PHP 8.0.3)
1. Clone o repositório usando: git clone https://github.com/eljuanreis/dev-contato.git

2. Crie um banco de dados e faça a configuração de acesso ao banco de dados no arquivo .env (variáveis de ambiente)

3. Faça a configuração de e-mail no arquivo .env (variáveis de ambiente)

5. Acesse o projeto via terminal/console e use o: `php artisan migrate`

6. Acesse o projeto via terminal/console e use o: `php artisan db:seed`

7. Para criar um usuários administrativo, vá no console e digite: `php artisan tinker`
Logo em seguida crie um objeto de administrador:
`$admin = new Admin();`

Com isso crie um usuário administrativo com a instrução:
`$admin->create(['name' => 'VALOR_NOME', 'email' => 'VALOR_EMAIL', 'password' => 'VALOR_SENHA']);`

Obs: a rota para acessar o login é: http://127.0.0.1:8000/login
Obs: os emails de contato dos usuários são enviados pro email do .env

7. Após todos os passos acima, use o: `php artisan serve`

## Objetivo
Elaborar uma ideia mais sólida do Framework Laravel.
Obs: não usei autenticação do Laravel justamente pra treinar conhecimentos

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
