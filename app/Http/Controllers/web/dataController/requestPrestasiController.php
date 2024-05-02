<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\request_prestasi;

class requestPrestasiController extends Controller
{
    public function index()
    {
        $data['dataRequest'] = request_prestasi::all();
        $data['titlePage'] = 'Notifikasi Prestasi';
        return view('\admin\notifikasiRequest\index\indexRequestPrestasi', $data);
    }

    public function create()
    {
        $data['account'] = auth::guard('mahasiswa')->user();
        return view('\user\profile\request\formSendPrestasi', $data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nimMahasiswa' => ['required'],
            'namaPerlombaan' => ['required', 'max:255'],
            'namaPrestasi' => ['required', 'max:255'],
            'tingkatan' => ['required', 'max:255'],
        ]);
        $getApiMahasiswa = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa/' . $validateData['nimMahasiswa'];
        $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
        $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
        $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
        $dataMahasiswa = $contentArrayMahasiswa['data'][0];
        request_prestasi::create([
            'nim' => $dataMahasiswa['nim'],
            'nama_mahasiswa' => $dataMahasiswa['nama_mahasiswa'],
            'nama_perlombaan' => $validateData['namaPerlombaan'],
            'nama_prestasi' => $validateData['namaPrestasi'],
            'tingkatan_id' => $validateData['tingkatan'],
            'status_id' => 2,
        ]);
        return redirect(route('profilPage'))->with('pengajuanSended', 'Pengajuan Berhasil Dikirim');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
