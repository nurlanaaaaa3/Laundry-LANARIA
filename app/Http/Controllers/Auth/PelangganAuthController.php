<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganAuthController extends Controller
{
    public function showRegisterForm()
    {
        if (Auth::guard('pelanggan')->check()) {
            return redirect()->route('pelanggan.dashboard');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:pelanggan,username',
            'password' => 'required|string|min:6',
        ]);

        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $data['nama_pelanggan'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('pelanggan')->login($pelanggan);

        return redirect()->route('pelanggan.dashboard');
    }

    public function showLoginForm()
    {
        if (Auth::guard('pelanggan')->check()) {
            return redirect()->route('pelanggan.dashboard');
        }

        return view('auth.login-pelanggan');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('pelanggan.dashboard'));
        }

        return back()
            ->withErrors(['username' => 'Username atau password salah.'])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}