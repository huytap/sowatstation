<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('admin.index', compact('title'));
    }

    public function login()
    {
        $title = 'Login';
        return view('admin.login', compact('title'));
    }

    public function store(StoreRequest $request)
    {
        if (Auth::guard('web')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_admin' => 1
        ], $request->input('remember'))) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Sai email hoặc mật khẩu');
    }

    public function changepassword(User $user)
    {
        $title = 'Change Passowrd';
        return view('admin.changepassword', compact('title'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
