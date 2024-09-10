{{--views/usuarios/cadastrar.blade.php--}}

@extends('base')

@section('titulo', 'Cadastrar | Usuários
')

@section('conteudo')
<p>Preencha o formulário</p>

<form method="post" action="{{route ('usuarios.gravar')}}">
    @csrf
    {{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}"> 
    <br>
    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"> 
    <br>
    <input type="text" name="username" placeholder="Usuario" value="{{ old('username') }}"> 
    <br>
    <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}"> 
    <br>
    <select name="admin">
        <option value="null">Selecione uma opção</option>
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select>
    <br>
    <input type="submit" value="Gravar">
</form>
@endsection
