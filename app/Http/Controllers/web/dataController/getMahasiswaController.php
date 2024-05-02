<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class getMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $getApiMahasiswa = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-all-data-mahasiswa';
        $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
        $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
        $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
        $dataMahasiswa =  $contentArrayMahasiswa['data'];
        if($request->search) {
            if ($request->typeSearching == "Nama Mahasiswa"){
            $getApiMahasiswa = new Client();
            $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa-by-nama/' . $request->search;
            $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
            $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
            $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
            $dataMahasiswa =  $contentArrayMahasiswa['data'];
            }
            if ($request->typeSearching == "Nim"){
            $getApiMahasiswa = new Client();
            $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa-by-nim/' . $request->search;
            $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
            $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
            $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
            $dataMahasiswa =  $contentArrayMahasiswa['data'];
            }
        }
        return view('\admin\indexData\daftarMahasiswaIndexData', [
            'data' => $dataMahasiswa,
            'titlePage' => 'index Mahasiswa',
        ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
