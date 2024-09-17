<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::orderBy('name', 'asc')->get();

        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.cadastrar');
    }

    public function insert(Request $form)
    {
        $dados = $form->validate([
            'name' => 'required',
            'email' => 'email|required|unique:usuarios',
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'admin' => 'boolean',
        ]);

        $dados['password'] = Hash::make($dados['password']);

        Usuarios::create($dados);

        return redirect()->route('usuarios');
    }

    public function login(Request $form) {
        if ($form->isMethod('POST')) {

            // Pega os dados do formulário
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required',


            ]);

            // Tenta fazer o login
            if (Auth::attempt($credenciais)) {
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        return view('usuarios.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
    public function apagar(usuarios $usuario) {
        return view('usuarios.apagar', [
            'usuario' => $usuario,
        ]);
    }

    public function deletar(usuarios $usuario) {
        $usuario->delete();
        return redirect()->route('usuarios');
    }
}

