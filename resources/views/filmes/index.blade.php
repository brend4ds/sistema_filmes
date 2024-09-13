{{-- resources/views/animais/index.blade.php --}}


@extends('base')


@section('titulo', 'Filmes')


@section('conteudo')
<p>
    <a href="{{ route('filmes.cadastrar') }}">Cadastrar filme</a>
</p>
<p>Lista de usuários</p>


<table border="1">
{{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sinopse</th>
        <th>Ano</th>
        <th>Categoria</th>
        <th>Link</th>
    </tr>


    @foreach ($filmes as $filme)
    <tr>
        <td>{{ $filme->id }}</td>
        <td>{{ $filme->name }}</td>
        <td>{{ $filme->sinopse }}</td>
        <td>{{ $filme->ano }}</td>
        <td>{{ $filme->categoria }}</td>
        <td>{{ $filme->link }}</td>
    </tr>
    @endforeach


</table>
@endsection
