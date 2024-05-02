<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\beasiswa;
use App\Models\lomba;
use App\Models\mahasiswa_prestasi;

class guestController extends Controller
{
    public function beranda()
    {
        $data['account'] = auth::guard('mahasiswa')->user();
        return view('\user\beranda', $data);
    }
    public function indexBeasiswa(Request $request)
    {   
        $dataBeasiswa = beasiswa::all();
        if ($request->opsiDropdown === 'Terlama') {
            $dataBeasiswa = beasiswa::orderBy('id', 'DESC')->get();
        }
        if ($request->opsiDropdown === 'Status Aktif') {
            $dataBeasiswa = beasiswa::where('status', '1')->get();
        }
        if ($request->opsiDropdown === 'Status Nonaktif') {
            $dataBeasiswa = beasiswa::where('status_id', '2')->get();
        }
        if ($request->opsiDropdown === 'Lokal') {
            $dataBeasiswa = beasiswa::where('tingkatan_id', '1')->get();
        }
        if ($request->opsiDropdown === 'International') {
            $dataBeasiswa = beasiswa::where('tingkatan', '1')->get();
        }
        return view('\user\indexBeasiswa', [
            'titlePage' => 'Index Beasiswa',
            'headTittle' => 'Beasiswa',
            'containPage' => 'beasiswa',
            'data' => $dataBeasiswa,
        ]);
    }
    public function indexLomba(request $request)
    {
        $dataLomba = lomba::all();
        if ($request->opsiDropdown === 'Terlama') {
            $dataLomba = lomba::orderBy('id', 'DESC')->get();
        }
        if ($request->opsiDropdown === 'Status Aktif') {
            $dataLomba = lomba::where('status', '1')->get();
        }
        if ($request->opsiDropdown === 'Status Nonaktif') {
            $dataLomba = lomba::where('status_id', '2')->get();
        }
        if ($request->opsiDropdown === 'Lokal') {
            $dataLomba = lomba::where('tingkatan_id', '1')->get();
        }
        if ($request->opsiDropdown === 'International') {
            $dataLomba = lomba::where('tingkatan', '1')->get();
        }
        return view('\user\indexLomba', [
            'titlePage' => 'Index Lomba',
            'headTittle' => 'Lomba',
            'containPage' => 'lomba',
            'data' => $dataLomba,
        ]);
    }
    public function indexPrestasi()
    {
        $dataPrestasi = mahasiswa_prestasi::all();
        return view('\user\indexPrestasi', [
            'titlePage' => 'Index Prestasi',
            'headTittle' => 'Prestasi',
            'containPage' => 'prestasi',
            'data' => $dataPrestasi,
        ]);
    }
    public function loginMahasiswa()
    {
        return view('\user\auth\loginSSO');
    }
}
