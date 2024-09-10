@extends('base')

@section('titulo', 'Editar | Usuários')

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

 <form action="{{ route('usuarios.editar', $usuario->id) }}" method="post">
    @csrf
    @method('put')
 
    <p>
        <input value="{{ old('nome', $usuario->nome ?? '') }}" type="text" name="nome" placeholder="Nome do usuario" value="">
    </p>
    <p>
        <input value="{{ old('email', $usuario->email ?? '') }}" type="text" name="email" placeholder="Email" value="">
    </p>
    <p>
        <input value="{{ old('usuario', $usuario->usuario ?? '') }}" type="text" name="usuario" placeholder="Usuario" value="">
    </p>
     <p>
        <input value="{{ old('senha', $usuario->senha ?? '') }}" type="text" name="senha" placeholder="Senha" value="">
    </p>
    <p>
        <input value="{{ old('admin', $usuario->admin?? '') }}" type="text" name="admin" placeholder="Admin" value="">
    </p>

    <input type="submit" value="Editar">
 </form>

@endsection