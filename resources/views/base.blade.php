{{-- resources/views/base.blade.php --}}

<html>
    <head>
        <title>@yield('titulo')</title>
    </head>
    <body>
        <h1>@yield('titulo')</h1>
       <hr>
        <a href="{{ route('index') }}">Inicial</a>
        |
        <a href="{{ route('filmes') }}">Filmes</a>
        |
        @if(Auth::user() && Auth::user()['admin'])
        <a href="{{ route('usuarios') }}">Usuários</a>
        |
        @else
        |   Você não está autentificado
        @endif
        
        @if(Auth::user())
        Olá, <strong>{{Auth::user()['name']}}</strong>.
        <a href="{{ route ('logout') }}">Logout</a>
        @else
        <a href="{{ route('login') }}">Login</a>
        @endif
        <hr>

        <div>
            <h1>@yield('titulo')</h1>
            @if(session('erro'))
            <p>Erro!</p>
            <p>{{session('erro')}}</p>
            @endif
        </div>


        @yield('conteudo')
    </body>
</html>