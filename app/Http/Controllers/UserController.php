<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function create(): View
    {
        return view('user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
           'name' => $request->name,
           'email' =>  $request->email,
           'password' =>  bcrypt($request->password)
        ]);

        if ($user) {
            session()->flash('success', 'Регистрация пройдена');
            Auth::login($user);

            return redirect()->home();
        }

        session()->flash('error', 'Ошибка регистрации');
        return redirect()->route('register');
    }

    public function loginForm(): View
    {
        return view('user.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            session()->flash('success', 'Можете работать в системе');

            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            }

            return redirect()->home();
        }

        session()->flash('error', 'Ошибка авторизации');
        return redirect()->back();
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login.create');
    }
}
