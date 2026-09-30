<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register', ['daftarRombel' => User::DAFTAR_ROMBEL]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'nis'      => 'required|digits_between:5,20|unique:users,nis',
            'rombel'   => ['required', Rule::in(User::DAFTAR_ROMBEL)],
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:15',
            'terms'    => 'accepted',
        ], [
            'terms.accepted' => 'Anda harus menyetujui syarat & ketentuan.',
        ]);

        unset($data['terms']);
        $data['role'] = 'user'; 

        $user = User::create($data); 
        Auth::login($user);

        return redirect()->route('user.dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}