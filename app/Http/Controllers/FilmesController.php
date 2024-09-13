<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(){
        $dados = Filme::all();
        //dd($dados); funcao mais import do laravel
        return view('filmes.index', [
            'filmes' => $dados,
        ]);
    }
    public function cadastrar(){
        return view('filmes.cadastrar');
    }

    public function gravar(Request $form){//acessado animias.cadastrar via post, submetendo o form
        //filmes(nome da pasta imagem(nome do disco q vai armazenar)
        $img = $form->file('imagem')->store('filmes', 'imagens');
       

        dd($form);
        $dados = $form->validate([ //validar os dados antes do create
            //{{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
            'nome' => 'required',//campo nome temq  ser obrigatorio  
            'sinopse' => 'required', //campo idade temq ser obrig e inteiro
            'ano' => 'required|integer',
            'categoria' => 'required',
            'link' => 'required'
        ]);

        $dados['imagem'] = $img;

        Filme::create($dados);
        
        return redirect()->route('filmes');
    }

    public function apagar( Filme $filme){//mostra na tela a confirmacao
        return view('filmes.apagar', [
            'Filme' => $filme
        ]);
    }

    public function deletar(Filme $filme){
        $filme->delete();
        return redirect()->route('filmes');
    }

    public function editar(Filme $filme) {//apaga do banco
        return view('filmes/editar', [
            'Filme' => $filme
        ]);
    }

    public function editarGravar(Request $form, Filme $filme){
        $dados = $form->validate([
        //{{-- nome, sinopse, ano, categoria, imagem da capa, link do trailer no YouTube --}}
        'nome' => 'required|max:255',
        'sinopse' => 'sinopse',
        'ano' => 'required|integer',
        'categoria' => 'required',
        'link' => 'required'
        ]);

        $filme->fill($dados);
        $filme->save();
        return redirect()->route('filmes');
    }

}
