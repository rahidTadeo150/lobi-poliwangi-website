<?php

namespace App\Http\Controllers\webUser\sso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\user;

class oauth extends Controller
{
    public function redirectTo() {
        $query = http_build_query([
            'client_id' => '9b10ea4f-000e-4f02-bc3d-e8f1410e737e',
            'redirect_uri' => 'http://127.0.0.1:8080/oauth/callback',
            'response_type' => 'code',
        ]);
        return redirect('http://127.0.0.1:8000/oauth/authorize?' . $query);
    }
    public function callback(Request $request) {    
        $response = Http::post('http://127.0.0.1:8000/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '9b10ea4f-000e-4f02-bc3d-e8f1410e737e',
            'client_secret' => 'mZu2ONHhGqvgviQrQH69ujPagR9f8DBUgByLLSba',
            'redirect_uri' => 'http://127.0.0.1:8080/oauth/callback',
            'code' => $request->code,
        ]);
        $request->session()->put($response->json());
        return redirect('/oauth/connect-user');
    }
    public function connectUser(Request $request) {    
        $access_token = $request->session()->get('access_token');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $access_token,
        ])->get('http://127.0.0.1:8000/api/user');
        $userArray = $response->json();
        try {
            $ssoUser = $userArray[0];
        } catch (\Throwable $th) {
            return redirect('/login-mahasiswa')->with('connectUserFailed', 'Terdapapat Kesalahan Saat Menyambungkan User');
        }
        $user = user::where('nim', $ssoUser['nim'])->first();
        if (!$user) {
            $user = new user;
            $user->nim = $ssoUser['nim'];
            $user->nama_mahasiswa = $ssoUser['nama_mahasiswa'];
            $user->access_token = $access_token;
            $user->save();
        } else {
            $user->update([
                'access_token' => $access_token,
            ]);
        }
        auth::guard('mahasiswa')->login($user);
        return redirect(route('home'));
    }
    public function logout(Request $request)
    {
        $access_token = $request->session()->get('access_token');
        $user = user::where('access_token', $access_token)->first();
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $access_token,
        ])->post('http://127.0.0.1:8000/api/logoutme');
        $user->update([
            'access_token' => 'inactive',
        ]);
        auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route("login"))->with('logoutMessage', 'Anda Telah Berhasil Login');
    }
}
