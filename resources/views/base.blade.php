<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- Barra de navegação -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('index')}}">Sistema Filmes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index')}}">Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('filmes')}}">Filmes</a>
                        </li>
                        @if (Auth::user() && Auth::user()->admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('usuarios')}}">Usuários</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('usuarios.cadastrar')}}">Cadastre-se</a>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user())
                            <li class="nav-item">
                                <span class="navbar-text">Olá, <strong>{{ Auth::user()->name }}</strong>.</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-danger ms-3" href="{{route('logout')}}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary" href="{{route('login')}}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">@yield('titulo')</h1>

                    <!-- Exibição de mensagens de erro -->
                    @if(session('erro'))
                        <div class="alert alert-danger">
                            <strong>Erro!</strong> {{ session('erro') }}
                        </div>
                    @endif

                    <!-- Conteúdo da página -->
                    @yield('conteudo')
                </div>
            </div>
        </div>

        <!-- Bootstrap JS (para funcionalidade como o menu colapsável) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
