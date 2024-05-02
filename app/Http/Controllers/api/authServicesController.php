<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class authServicesController extends Controller
{
    public function fetchMahasiswaByNim (String $nim, String $password) {
        try {
            $getApiMahasiswa = new Client();
            $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa/' . $nim;
            $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
            if($responseMahasiswa->getStatusCode() == 200){
                $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
                $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
                $dataMahasiswa = $contentArrayMahasiswa['data'][0];
                return $dataMahasiswa;
            } else {
                return [
                    "nama_mahasiswa" => "Data Not Found"
                ];
            }
        } catch (\Exception $err) {
            return ['nama_mahasiswa' => "Data Not Found"];
        }
    }

    public function login(Request $request) 
    {
        $validateData = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
            'namaMahasiswa' => ['required'],
            'authPassword' => ['required'],
        ]);
        if(Hash::check($request->password, $request->authPassword)){
            $user = user::where('nim', $request->nim)->first();
            if (!$user) {
                $user = new user;
                $user->nim = $request->nim;
                $user->nama_mahasiswa = $request->namaMahasiswa;
                $user->access_token = 'inactive';
                $user->save();
            }
            $token = $user->createToken($request->nim)->plainTextToken;
            $user->update([
                'access_token' => $token,
            ]);
            $response = [
                'message' => 'Login Success',
                'token' => $token,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Nim Atau Password Salah',
            ];
            return response()->json($response, 404);
        }
    }

    public function connectMe()
    {
        $user = auth::user();

        $response = [
            'message' => 'Token Terverifikasi',
            'data' => $user,
        ];

        return response()->json($response, 200);
    }

    public function logout()
    {
        $dataUser = auth::user();
        $user = user::where('access_token', $dataUser->access_token)->first();
        $user->delete();

        $logout = auth()->user()->currentAccessToken()->delete();
        
        $response = [
            'message' => 'Logout Successful',
        ];

        return response()->json($response, 200);
    }
}
