<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index(){
        $dados = Usuario::orderBy('name', 'asc')->get();
        //dd($dados); //funcao mais import do laravel
        return view('usuarios.index', [
            'usuarios' => $dados,
        ]);
    }
    public function cadastrar(){
        return view('usuarios.cadastrar');
    }

    public function gravar(Request $form){//acessado animias.cadastrar via post, submetendo o form
        $dados = $form->validate([ //validar os dados antes do create
            'name' => 'required',//campo nome temq  ser obrigatorio  
            'email' => 'required',
            'username' => 'required', //campo idade temq ser obrig e inteiro
            'password' => 'required',
            'admin' => 'boolean'
        ]);

        $dados['password'] = Hash::make($dados['password']);

        Usuario::create($dados);
        
        return redirect()->route('usuarios');
    }

    public function apagar( Usuario $usuario){
        return view('usuarios.apagar', [
            'usuario' => $usuario
        ]);
    }

    public function deletar(Usuario $usuario){
        $usuario->delete();
        return redirect()->route('usuarios');
    }

    public function editar(Usuario $usuario) {//apaga do banco
        return view('usuarios/editar', [
            'usuario' => $usuario
        ]);
    }

    public function editarGravar(Request $form, Usuario $usuario){
        $dados = $form->validate([
        'name' => 'required',
        'email' => 'email|required|unique:usuarios',
        'username' => 'required|min:3',
        'password' => 'required|min:3',
        'admin' => 'boolean'
        ]);

        $usuario->fill($dados);
        $usuario->save();
        return redirect()->route('usuarios');
    }

    public function login(Request $form){//mostra o form(get) e validar o login(post)

        if($form->isMethod('POST')){//se o metodo é post
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            //tenta fzr o login
            if(Auth::attempt($credenciais)){
                return redirect()->intended(route('index'));//metodo intented rota q a pessoa ta querendo ir, intencional
                //colocar route index p intended procurar a rota e nao o endereco index
            }else{
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        return view('usuarios.login');//se o metodo é get
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
