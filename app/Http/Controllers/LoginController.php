<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    // CREA LA SESION
    public function store( LoginRequest $request )
    {

        $credentials =  $request->validated();

        if( !Auth::attempt($credentials) )
        {
            return back()->with('message', 'Credenciales incorrectas');
        }

        return redirect()->route('products.index');

    }
}
