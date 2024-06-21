<?php

namespace App\Http\Controllers;

use App\Models\UserDenzibang;
use App\Models\UserMinada;
use App\Models\UserSiwas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function siwas()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('siwas')->attempt($credentials)) {
            // Redirect to the intended URL or to a specific route
            return redirect()->intended(route('siwas'));
        } else {
            return redirect()->route('login.siwas')->with('failed', 'Email or Password is incorrect.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_siwas,email',
            'password' => 'required|min:6'
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        UserSiwas::create($data);

        return redirect()->route('login.siwas');
    }

    public function logout_siwas(Request $request)
    {
        if (Auth::guard('siwas')->check()) {
            Auth::guard('siwas')->logout();
        } elseif (Auth::guard('denzibang')->check()) {
            Auth::guard('denzibang')->logout();
        } elseif (Auth::guard('minada')->check()) {
            Auth::guard('minada')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.siwas');
    }

    // Denzibang
    public function denzibang()
    {
        return view('auth.denzibang');
    }

    public function register_denzibang()
    {
        return view('auth.registerDenzibang');
    }

    public function register_denzibang_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_denzibangs,email',
            'password' => 'required|min:6'
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        UserDenzibang::create($data);

        return redirect()->route('login.denzibang');
    }

    public function login_denzibang_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('denzibang')->attempt($credentials)) {
            // Redirect to the intended URL or to a specific route
            return redirect()->intended(route('denzibang'));
        } else {
            return redirect()->route('login.denzibang')->with('failed', 'Email or Password is incorrect.');
        }
    }

    public function logout_denzibang(Request $request)
    {
        if (Auth::guard('siwas')->check()) {
            Auth::guard('siwas')->logout();
        } elseif (Auth::guard('denzibang')->check()) {
            Auth::guard('denzibang')->logout();
        } elseif (Auth::guard('minada')->check()) {
            Auth::guard('minada')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.denzibang');
    }

    // MINADA
    public function minada()
    {
        return view('auth.minada-login');
    }

    public function register_minada()
    {
        return view('auth.minada-register');
    }

    public function register_minada_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_minadas,email',
            'password' => 'required|min:6'
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        UserMinada::create($data);

        return redirect()->route('login.minada');
    }

    public function login_minada_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('minada')->attempt($credentials)) {
            // Redirect to the intended URL or to a specific route
            return redirect()->intended(route('minada'));
        } else {
            return redirect()->route('login.minada')->with('failed', 'Email or Password is incorrect.');
        }
    }

    public function logout_minada(Request $request)
    {
        if (Auth::guard('siwas')->check()) {
            Auth::guard('siwas')->logout();
        } elseif (Auth::guard('denzibang')->check()) {
            Auth::guard('denzibang')->logout();
        } elseif (Auth::guard('minada')->check()) {
            Auth::guard('minada')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.minada');
    }
}
