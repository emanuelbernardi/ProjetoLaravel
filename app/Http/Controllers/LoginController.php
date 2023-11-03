<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function auth(Request $request){

        $credeciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email é invalido',
            'password.required' => 'a Senha é obrigatório',
        ]);

        if(Auth::attempt($credeciais, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back()->with('erro', 'Email ou senha invalido');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('site.index'));
    }

    public function create() {
        return view('login.create');
    }

}
