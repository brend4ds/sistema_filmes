@extends('base')

@section('titulo', 'Apagar | Filmes')

@section('conteudo')
<p>Tem certeza que deseja apagar?</p>
<p><em>{{$filme['nome']}}</em></p>
<form 
    action="{{route('filmes.apagar', $filme['id'])}}" 
    method="post">
    @method('delete')
    @csrf
    <input type="submit" value="Apaga!">
</form>

<a href="{{route('filmes')}}">Cancelar</a>
@endsection