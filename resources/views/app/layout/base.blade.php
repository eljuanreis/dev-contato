<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>@yield('titulo')</title>
</head>
<body>
<header>
    <nav id='navbar'>
        <ul>
            <li><span class='site_name'>Developer</span></li>
             <span class='navlinks'>
            <li>
                <a href='{{route('inicio')}}'>Início</a>
            </li>
            <li>
                <a href="">Skills</a>
            </li>
            <li>
                <a href=''>Contato</a>
            </li>
        </span>
        </ul>
    </nav>
</header>

@yield('conteudo')

<footer>
    <span>Copyrights, YXZ</span>
</footer>
</body>
</html>