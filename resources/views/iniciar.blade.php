@extends('base')

@section('titulo', 'Página Inicial')

@section('conteudo')
    <p>Sejam bem-vindos a página inicial</p>
@endsection
{{-- <html>
    <head>
        <title>@yield('titulo')</title>
    </head>
    <body>
        <h1>@yield('titulo')</h1>
        <hr>
        <a href="{{ route('index') }}">Inicial</a>
        <a href="{{ route('filmes') }}">Filmes</a>
        <a href="{{ route('usuarios') }}">Usuários</a>
        <a href="{{ route('login') }}">Login</a>

        <hr>
        @yield('conteudo')
        <p>Sejam bem-vindos à página inicial</p>
    </body>
</html>  --}}