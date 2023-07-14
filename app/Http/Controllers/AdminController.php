<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

//    public function store(Request $request)
//    {
//        $request->validate([
//            'login' => ['required', 'string'],
//            'password' => ['required', 'string']
//        ]);
//
//        Auth::attempt(['login' => $request->login, 'password' => $request->password]);
//        return redirect()->route('position.index');
//    }
    public function store(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (Auth::guard('admin')->attempt(['login' => $request->login, 'password' => $request->password])) {
            // Аутентификация прошла успешно
            return redirect()->route('position.index');
        }

        // Если код дошел досюда, это значит, что аутентификация не удалась.
        // Вы можете возвращать ошибку или перенаправлять обратно на форму входа.
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
