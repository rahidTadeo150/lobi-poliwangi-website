<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;


// Import Table //
use App\Models\beasiswa;
use App\Models\lomba;
use App\Models\tingkatan;
use App\Models\mahasiswa_prestasi;
use App\Models\jurusan;
use App\Models\account_admin;
use App\Models\instansi_beasiswa;
use App\Models\instansi_lomba;
use App\Models\prestasi;
use App\Charts\dataKeseluruhan;
use App\Models\request_prestasi;

class adminController extends Controller
{
    public function indexDashboard(dataKeseluruhan $chartData)
    {
        $data['chartData'] = $chartData->build();
        $data['beasiswaTerbaru'] = beasiswa::latest()->take(2)->get();
        $data['notifikasiTerbaru'] = request_prestasi::latest()->take(1)->get();
        if ($data['beasiswaTerbaru']->isEmpty()) {
            $data['beasiswaTerbaru'] = null;
        }
        $data['lombaTerbaru'] = lomba::latest()->take(2)->get();
        if ($data['lombaTerbaru']->isEmpty()) {
            $data['lombaTerbaru'] = null;
        }
        if ($data['notifikasiTerbaru']->isEmpty()) {
            $data['notifikasiTerbaru'] = null;
        }
        $data['jumlahPrestasi'] = mahasiswa_prestasi::all()->count();
        return view('\admin\dashboard', $data);
    }

    public function indexInstansiBeasiswa(Request $request)
    {
        $dataInstansiAll = instansi_beasiswa::all();
        if($request->search) {
            $dataInstansiAll = beasiswa::where('nama_instansi_beasiswa', 'like', '%' . $request->search . '%')->get();
            $jumlahData = beasiswa::where('nama_instansi_beasiswa', $request->search)->count();
        }
        if ($dataInstansiAll->isEmpty()) {
            $dataInstansiAll = null;
        }
        return view('\admin\indexData\instansiBeasiswaIndex', [
            'titlePage' => 'Index Data Instansi',
            'data' => $dataInstansiAll,
        ]);
    }

    public function indexInstansiLomba(Request $request)
    {
        $dataInstansiAll = instansi_lomba::all();
        if($request->search) {
            $dataInstansiAll = lomba::where('nama_instansi_lomba', 'like', '%' . $request->search . '%')->get();
            $jumlahData = lomba::where('nama_instansi_lomba', $request->search)->count();
        }
        if ($dataInstansiAll->isEmpty()) {
            $dataInstansiAll = null;
        }
        return view('\admin\indexData\instansiLombaIndex', [
            'titlePage' => 'Index Data Instansi',
            'data' => $dataInstansiAll,
        ]);
    }

    public function indexTableLomba(Request $request)
    {
        if ($request->codeRequest == "history") {
            $dataLombaAll = lomba::onlyTrashed()->get();
            $jumlahData = lomba::onlyTrashed()->count();
            if($request->search) {
                    $dataLombaAll = lomba::onlyTrashed()->where('nama_lomba', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = lomba::onlyTrashed()->where('nama_lomba', 'like', '%' .$request->search. '%')->count();
                }
            if ($dataLombaAll->isEmpty()) {
                $dataLombaAll = null;
            }
            return view('\admin\indexData\lombaIndexData', [
                'titlePage' => 'History Data Lomba',
                'data' => $dataLombaAll,
                'jumlahData' => $jumlahData,
                'codeRequest' => $request->codeRequest,
            ]); 
        } else {
            $dataLombaAll = lomba::all();
            $jumlahData = lomba::all()->count();
            if($request->search) {
                $dataLombaAll = lomba::where('nama_lomba', 'like', '%' . $request->search . '%')->get();
                $jumlahData = lomba::where('nama_lomba', $request->search)->count();
            }
            if ($dataLombaAll->isEmpty()) {
                $dataLombaAll = null;
            }
            return view('\admin\indexData\lombaIndexData', [
                'titlePage' => 'Index Data Lomba',
                'data' => $dataLombaAll,
                'jumlahData' => $jumlahData,
                'codeRequest' => null,
            ]);
        }
    }

    public function indexBeasiswa(Request $request)
    {
        if ($request->codeRequest == "history") {
        $dataBeasiswaAll = beasiswa::onlyTrashed()->get();
        $jumlahData = beasiswa::onlyTrashed()->count();
        if($request->search) {
                $dataBeasiswaAll = beasiswa::onlyTrashed()->where('nama_beasiswa', 'like', '%' .$request->search. '%')->get();
                $jumlahData = beasiswa::onlyTrashed()->where('nama_beasiswa', 'like', '%' .$request->search. '%')->count();
            }
        if ($dataBeasiswaAll->isEmpty()) {
            $dataBeasiswaAll = null;
        }
        return view('\admin\indexData\beasiswaIndexData', [
            'titlePage' => 'History Data Beasiswa',
            'data' => $dataBeasiswaAll,
            'jumlahData' => $jumlahData,
            'codeRequest' => $request->codeRequest,
        ]); 
        } else {
            $dataBeasiswaAll = beasiswa::all();
            $jumlahData = beasiswa::all()->count();
            if($request->search) {
                $dataBeasiswaAll = beasiswa::where('nama_beasiswa', 'like', '%' . $request->search . '%')->get();
                $jumlahData = beasiswa::where('nama_beasiswa', $request->search)->count();
            }
            if ($dataBeasiswaAll->isEmpty()) {
                $dataBeasiswaAll = null;
            }
            return view('\admin\indexData\beasiswaIndexData', [
                'titlePage' => 'Index Data Beasiswa',
                'data' => $dataBeasiswaAll,
                'jumlahData' => $jumlahData,
                'codeRequest' => null,
            ]);
        }
    }

    public function indexTablePrestasi()
    {
        
    }

    public function indexTableMahasiswa()
    {
        $getApiMahasiswa = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-all-data-mahasiswa';
        $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
        $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
        $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
        $dataMahasiswa =  $contentArrayMahasiswa['data'];
        return view('\admin\indexData\daftarMahasiswaIndexData', [
            'data' => $dataMahasiswa,
            'titlePage' => 'index Mahasiswa',
        ]);
    }

    public function getInstansiBeasiswa(Request $request)
    { 
        if ($request->codeRequest == "update") {
            $dataInstansi = instansi_beasiswa::all();
            if($request->search) {
                $dataInstansi = instansi_beasiswa::where('nama_instansi_beasiswa', 'like', '%' . $request->search . '%')->get();
                $jumlahData = instansi_beasiswa::where('nama_instansi_beasiswa', $request->search)->count();
            }
            if ($dataInstansi->isEmpty()) {
                $dataInstansi = null;
            }
            $dataBeasiswa = beasiswa::where('id', $request->idBeasiswa)->first();
            return view('\admin\getInstansiBeasiswa\getInstansiUpdate', [
                'data' => $dataInstansi,
                'idBeasiswa' => $dataBeasiswa,
            ]);
        } else {
            $dataInstansi = instansi_beasiswa::all();
            if($request->search) {
                $dataInstansi = instansi_beasiswa::where('nama_instansi_beasiswa', 'like', '%' . $request->search . '%')->get();
                $jumlahData = instansi_beasiswa::where('nama_instansi_beasiswa', $request->search)->count();
            }
            if ($dataInstansi->isEmpty()) {
                $dataInstansi = null;
            }
            return view('\admin\getInstansiBeasiswa\getInstansiCreate', [
                'data' => $dataInstansi,
            ]);
        }
    }

    public function getInstansiLomba(Request $request)
    { 
        if ($request->codeRequest == "update") {
            $data['dataInstansi'] = instansi_lomba::all();
            $data['idLomba'] = lomba::where('id', $request->idLomba)->first();
            $data['redirect'] = $request->redirect;
            return view('\admin\getInstansiLomba\getInstansiUpdate', $data);
        } else {
            $data['dataInstansi'] = instansi_lomba::all();
            $data['redirect'] = $request->redirect;
            return view('\admin\getInstansiLomba\getInstansiCreate', $data);
        } 
    }
    public function getMahasiswa(Request $request)
    { 
        if ($request->codeRequest == "update") {
            $getApiMahasiswa = new Client();
            $urlApi = 'http://127.0.0.1:8000/api/get-all-data-mahasiswa';
            $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
            $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
            $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
            $dataMahasiswa =  $contentArrayMahasiswa['data'];
            $dataPrestasi = mahasiswa_prestasi::where('id', $request->idLomba)->first();
            return view('\admin\getMahasiswa\getMahasiswaUpdate', [
                'data' => $dataMahasiswa,
                'idLomba' => $dataPrestasi,
            ]);
        } else {
            $getApiMahasiswa = new Client();
            $urlApi = 'http://127.0.0.1:8000/api/get-all-data-mahasiswa';
            $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
            $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
            $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
            $dataMahasiswa =  $contentArrayMahasiswa['data'];
            return view('\admin\getMahasiswa\getMahasiswaCreate', [
                'data' => $dataMahasiswa,
            ]);
        }
    }

    public function createInstansiBeasiswa()
    {
        return view('\admin\CRUD\create\instansiCreate\formInstansiBeasiswa');
    }
    public function createInstansiLomba()
    {
        return view('\admin\CRUD\create\instansiCreate\formInstansiLomba');
    }

    public function redirectFormBeasiswa(Request $request)
    {
        
    }

    public function redirectFormLomba(Request $request)
    {
        $dataInstansi = instansi_lomba::where('id', $request->idInstansi)->first();
        $dataTingkatan = tingkatan::all();
        return view('\admin\CRUD\create\formCreateLomba', [
            'data' => $dataInstansi,
            'dataTingkatan' => $dataTingkatan,
        ]);
    }

    public function redirectFormPrestasi(Request $request)
    {
        $getApiProdi = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-data-prodi-all';
        $responseProdi = $getApiProdi->request('GET', $urlApi);
        $contentProdi = $responseProdi->getBody()->getContents();
        $contentArrayProdi = json_decode($contentProdi, true);
        $dataProdi =  $contentArrayProdi['data'];
        $getApiMahasiswa = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa/' . $request->idMahasiswa;
        $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
        $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
        $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
        $dataMahasiswa =  $contentArrayMahasiswa['data'][0];
        return view('\admin\CRUD\create\formCreatePrestasiMahasiswa', [
            'dataProdi' => $dataProdi,
            'data' => $dataMahasiswa,
        ]);
    }

    public function formEditBeasiswa(beasiswa $beasiswa, Request $request)
    {
        if($request->codeRequest == 'update') {
            $dataBeasiswa = beasiswa::where('id', $beasiswa->id)->first();
            $dataInstansi = instansi_beasiswa::where('id', $request->idInstansi)->first();
            $dataTingkatanBeasiswa = tingkatan::all();
            return view('\admin\CRUD\update\formEditBeasiswa', [
                'data' => $dataBeasiswa,
                'dataInstansi' => $dataInstansi,
                'dataTingkatan' => $dataTingkatanBeasiswa,
            ]);
        } else {
            $dataBeasiswa = beasiswa::where('id', $beasiswa->id)->first();
            $dataTingkatanBeasiswa = tingkatan::all();
            return view('\admin\CRUD\update\formEditBeasiswa', [
                'data' => $dataBeasiswa,
                'dataInstansi' => $dataBeasiswa->instansiBeasiswa,
                'dataTingkatan' => $dataTingkatanBeasiswa,
            ]);
        }
    }

    public function formEditLomba(lomba $lomba, Request $request)
    {
        if($request->codeRequest == 'update') {
            $dataLomba = lomba::where('id', $lomba->id)->first();
            $dataInstansi = instansi_lomba::where('id', $request->idInstansi)->first();
            $dataTingkatan = tingkatan::all();
            return view('\admin\CRUD\update\formEditLomba', [
                'data' => $dataLomba,
                'dataInstansi' => $dataInstansi,
                'dataTingkatan' => $dataTingkatan,
            ]);
        }
        $dataLomba = lomba::where('id', $lomba->id)->first();
        $dataTingkatan = tingkatan::all();
        return view('\admin\CRUD\update\formEditLomba', [
            'data' => $dataLomba,
            'dataInstansi' => $dataLomba->instansiLomba,
            'dataTingkatan' => $dataTingkatan,
        ]);
    }

    public function formEditPrestasi(mahasiswa_prestasi $mahasiswa_prestasi, Request $request)
    {
        if($request->codeRequest == 'update') {
            $dataLomba = mahasiswa_prestasi::where('id', $mahasiswa_prestasi->id)->first();
            $getApiMahasiswa = new Client();
            $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa/' . $request->nim;
            $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
            $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
            $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
            $dataMahasiswa =  $contentArrayMahasiswa['data'][0];
            $dataTingkatan = tingkatan::all();
            return view('\admin\CRUD\update\formEditPrestasiMahasiswa', [
                'data' => $dataLomba,
                'dataMahasiswa' => $dataMahasiswa,
                'dataTingkatan' => $dataTingkatan,
            ]);
        } else {
            $dataPrestasi = mahasiswa_prestasi::where('id', $mahasiswa_prestasi->id)->first();
            $dataTingkatan = tingkatan::all();
            return view('\admin\CRUD\update\formEditPrestasiMahasiswa', [
                'data' => $dataPrestasi,
                'dataMahasiswa' => $dataPrestasi,
                'dataTingkatan' => $dataTingkatan,
            ]);
        }
    }
    
    public function profileAdmin()
    {
        $dataAccount = account_admin::where('username', auth('userAdmin')->user()->username)->first();
        return view('\admin\auth\profilPageAdmin', [
            'dataAccount' => $dataAccount,
        ]);
    }
}
