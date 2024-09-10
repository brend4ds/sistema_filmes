{{-- resources/views/animais/index.blade.php --}}


@extends('base')


@section('titulo', 'Usuários')


@se
ction('conteudo')
<p>
    <a href="{{ route('usuarios.cadastrar') }}">Cadastrar usuário</a>
</p>
<p>Lista de usuários</p>


<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Apagar</th>
    </tr>


    @foreach ($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->email }}</td>
        <td>{{ $usuario->admin ? 'Sim' : 'Não' }}</td>
        <td><a href="{{ route('usuarios.apagar', $usuario->id) }}">Apagar</a></td>
    </tr>
    @endforeach


</table>
@endsection
