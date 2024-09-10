{{--views/animais/cadastrar.blade.php--}}

@extends('base')

@section('titulo', 'Cadastrar | Filmes
')

@section('conteudo')
<p>Preencha o formulário</p>

<form method="post" action="{{route ('filmes.gravar')}}">
    @csrf
    {{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}"> 
    <br>
    <input type="text" name="sinopse" placeholder="Sinopse" value="{{ old('sinopse') }}"> 
    <br>
    <input type="date" name="ano" placeholder="Ano" value="{{ old('ano') }}"> 
    <br>
    <input type="text" name="categoria" placeholder="Categoria" value="{{ old('categoria') }}">
    <br>
    <input type="file" name="img" placeholder="Imagem" value="{{ old('imagem') }}">
    <br>
    <input type="text" name="link" placeholder="Link" value="{{ old('link') }}"> 
    <br>
    <input type="submit" value="Gravar">
</form>
@endsection
