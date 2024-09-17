<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index() {
        $dados = Filme::all();
        return view('filmes.index', [
            'filmes' => $dados,
        ]);
    }

    public function cadastrar() {
        return view('filmes.cadastrar');
    }

    public function gravar(Request $form)
    {
        $dados = $form->validate([
            'nome' => 'required|min:3',
            'sinopse' => 'required|min:3',
            'ano' => 'required',
            'categoria' => 'required',
            'link' => 'required|min:3',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($form->hasFile('imagem')) {
            $img = $form->file('imagem')->store('filmes', 'public');
            $dados['imagem'] = $img;
        } else {
            $dados['imagem'] = null; 
        }
        
       
        Filme::create($dados);
        
        
        return redirect()->route('filmes')->with('image', $img);
    }

    public function apagar(Filme $filme) {
        return view('filmes.apagar', [
            'filme' => $filme,
        ]);
    }

    public function deletar(Filme $filme) {
        $filme->delete();
        return redirect()->route('filmes');
    }

    
    public function editar(Filme $filme) {
        return view('filmes.editar', [
            'filme' => $filme,
        ]);
    }

    
    public function editarGravar(Request $form, Filme $filme) {
        $dados = $form->validate([
            'nome' => 'required|min:3',
            'sinopse' => 'required|min:3',
            'ano' => 'required|date',
            'categoria' => 'required|min:3',
            'link' => 'required|url',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        
        if ($form->hasFile('imagem')) {
            
            if ($filme->imagem) {
                \Storage::disk('public')->delete($filme->imagem);
            }
            $img = $form->file('imagem')->store('filmes', 'public');
            $dados['imagem'] = $img;
        }
        
        
        $filme->update($dados);
        
        return redirect()->route('filmes')->with('success', 'Filme atualizado com sucesso!');
    }
}
