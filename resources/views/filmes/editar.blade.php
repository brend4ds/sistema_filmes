@extends('base')

@section('titulo', 'Editar | Filmes')

@section('conteudo')
 <p>Edite o formulário</p>

    @if ($errors->any())
        <p>Preencha os campos corretamente.</p>

        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

 <form action="{{ route('filmes.editar', $filme->id) }}" method="post">
    @csrf
    @method('put')
    {{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
    <p><input value="{{ old('nome', $filme->nome ?? '') }}" type="text" name="nome" placeholder="Nome do filme" value=""></p>
    <p><input value="{{ old('nome', $filme->nome ?? '') }}" type="text" name="sinopse" placeholder="Sinopse" value=""></p>
    <p><input value="{{ old('nome', $filme->nome ?? '') }}" type="text" name="ano" placeholder="Ano" value=""></p>
    <p><input value="{{ old('nome', $filme->nome ?? '') }}" type="text" name="categoria" placeholder="Categoria" value=""></p>
    <p><input value="{{ old('nome', $filme->nome ?? '') }}" type="text" name="link" placeholder="Link" value=""></p>
    <input type="submit" value="Editar"></p>
 </form>

@endsection