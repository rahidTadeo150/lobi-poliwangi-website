<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function pageLoginForAdmin() {
        return view ('\admin\auth\loginPage');
    }

    public function authentikasiUserAdmin(Request $request) {

        $kredensialAdmin = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);
        
        if(Auth::guard('userAdmin')->attempt($kredensialAdmin)) {
            $request-> session()->regenerate();
            return redirect()->intended('/dashboard-admin');
        }
        else {
            return back()->with('authGagal', 'Login Gagal, Silahkan Coba Lagi.');
        }
    }
    public function logoutAccount() 
    {
        auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('loginAdmin'))->with('messageLogout', 'Anda Telah berhasil Log Out');
    }
}
