<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Auth Library Import //
use Illuminate\Support\Facades\Auth;

// Storage Library //
use Illuminate\Support\Facades\Storage;

// Import Model Table //
use App\Models\instansi_beasiswa;
use App\Models\beasiswa;
use App\Models\tingkatan;

class beasiswaModelController extends Controller
{

    public function index(Request $request)
    {
        if ($request->codeRequest == "history") {
            $data['dataBeasiswaAll'] = beasiswa::onlyTrashed()->join('instansi_beasiswa', 'beasiswa.instansi_beasiswa_id', '=', 'instansi_beasiswa.id')->get();
            $data['jumlahData'] = beasiswa::onlyTrashed()->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Beasiswa"){
                    $data['dataBeasiswaAll']  = beasiswa::onlyTrashed()->join('instansi_beasiswa', 'beasiswa.instansi_beasiswa_id', '=', 'instansi_beasiswa.id')->where('nama_beasiswa', 'like', '%' .$request->search. '%')->get();
                    $data['jumlahData'] = beasiswa::onlyTrashed()->where('nama_beasiswa', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "Nama Instansi"){
                    $data['dataBeasiswaAll'] = beasiswa::onlyTrashed()->join('instansi_beasiswa', 'beasiswa.instansi_beasiswa_id', '=', 'instansi_beasiswa.id')->where('instansi_beasiswa.nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->get();
                    $data['jumlahData'] = beasiswa::onlyTrashed()->where('instansi_beasiswa.nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($data['dataBeasiswaAll']->isEmpty()) {
                $data['dataBeasiswaAll'] = null;
            }
            $data['titlePage'] = 'History Data Beasiswa';
            $data['codeRequest'] = $request->codeRequest;
            return view('\admin\indexData\beasiswaIndexData', $data); 
            } else {
                $data['dataBeasiswaAll'] = beasiswa::join('instansi_beasiswa', 'beasiswa.instansi_beasiswa_id', '=', 'instansi_beasiswa.id')->get();
                $data['jumlahData'] = beasiswa::all()->count();
                if($request->search) {
                    if ($request->typeSearching == "Nama Beasiswa"){
                        $data['dataBeasiswaAll'] = beasiswa::join('instansi_beasiswa', 'beasiswa.instansi_beasiswa_id', '=', 'instansi_beasiswa.id')->where('nama_beasiswa', 'like', '%' .$request->search. '%')->get();
                        $data['jumlahData'] = beasiswa::where('nama_beasiswa', 'like', '%' .$request->search. '%')->count();
                    }
                    if ($request->typeSearching == "Nama Instansi"){
                        $data['dataBeasiswaAll'] = beasiswa::join('instansi_beasiswa', 'beasiswa.instansi_beasiswa_id', '=', 'instansi_beasiswa.id')->where('instansi_beasiswa.nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->get();
                        $data['jumlahData'] = beasiswa::where('instansi_beasiswa.nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->count();
                    }
                }
                if ($data['dataBeasiswaAll']->isEmpty()) {
                    $data['dataBeasiswaAll'] = null;
                }
                $data['titlePage'] = 'Index Data Beasiswa';
                $data['codeRequest'] = null;
                return view('\admin\indexData\beasiswaIndexData', $data);
            }
    }

    public function create(Request $request)
    {
        $dataInstansi = instansi_beasiswa::where('id', $request->idInstansi)->first();
        $dataTingkatan = tingkatan::all();
        return view('\admin\CRUD\create\formCreateBeasiswa', [
            'data' => $dataInstansi,
            'dataTingkatan' => $dataTingkatan,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaBeasiswa' => ['required', 'max:255'],
            'persyaratan' => ['required', 'max:255'],
            'linkPendaftaran' => ['required', 'max:255'],
            'tanggalPenutupan' => ['required'],
            'tingkatan' => ['required'],
            'dataImage' => ['required', 'file', 'image'],
        ]); 
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;
        $validateData['dataImage']=$request->file('dataImage')->store('beasiswaDataImg');

        $idInstansi = instansi_beasiswa::firstOrCreate([
            'id' => $request->idInstansi,
        ]);
        
        // Membuat Data Beasiswa Ke Model //
        beasiswa::create ([
            'nama_beasiswa' => $validateData['namaBeasiswa'],
            'instansi_beasiswa_id' => $idInstansi->id,
            'link_pendaftaran' => $validateData['linkPendaftaran'],
            'persyaratan' => $validateData['persyaratan'],
            'tanggal_penutupan' => $validateData['tanggalPenutupan'],
            'tingkatan_id' => $validateData['tingkatan'],
            'account_admin_id' => $validateData['accountAdmin'],
            'data_foto' => $validateData['dataImage'],
            'status_id' => '1',
        ]);

        return redirect()->route('indexDataBeasiswa')->with('successAddedData', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data['dataBeasiswa'] = beasiswa::withTrashed()->where('id', $id)->first();
        $data['dataInstansi'] = instansi_beasiswa::withTrashed()->where('id', $id)->first();
        return view('\admin\CRUD\read\previewBeasiswa', $data);
    }


    public function edit(beasiswa $beasiswa)
    {
        
    }

    public function update(beasiswa $beasiswa, Request $request)
    {
        $validateData = $request->validate([
            'namaBeasiswa' => ['required', 'max:255'],
            'persyaratan' => ['required', 'max:255'],
            'linkPendaftaran' => ['required', 'max:255'],
            'tanggalPenutupan' => ['required'],
            'tingkatan' => ['required'],
            'idInstansi' => ['required'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;

        $wantEditing = beasiswa::find($beasiswa->id);
        
        if ($request->file('imageChange'))
        {
            Storage::delete($request->imageNonchange);
            $validateData['dataFoto'] = $request->file('imageChange')->store('beasiswaDataImg');
            $wantEditing->update([
                'data_foto' => $validateData['dataFoto']
            ]);
        }
        $wantEditing->update([
            'nama_beasiswa' => $validateData['namaBeasiswa'],
            'instansi_beasiswa_id' => $request->idInstansi,
            'link_pendaftaran' => $validateData['linkPendaftaran'],
            'persyaratan' => $validateData['persyaratan'],
            'tanggal_penutupan' => $validateData['tanggalPenutupan'],
            'tingkatan_id' => $validateData['tingkatan'],
            'account_admin_id' => $validateData['accountAdmin'],
            'status_id' => '1',
        ]);
        return redirect()->intended('/dashboard-admin/index-data-beasiswa/preview/' . $wantEditing->id)->with('dataSuccessUpdated','Data Telah Sukses Di Update');

    }

    public function destroy(beasiswa $beasiswa)
    {
        $dataBeasiswa = beasiswa::find($beasiswa->id);
        $accountAdmin = auth('userAdmin')->user()->id;
        $dataBeasiswa->update([
            'status_id' => 2,
            'account_admin_id' => $accountAdmin,
        ]);
        $dataInstansi = instansi_beasiswa::find($beasiswa->instansiBeasiswa->id);
        $dataInstansi->update([
            'account_admin_id' => $accountAdmin,
        ]);
        $dataBeasiswa->delete();
        $dataInstansi->delete();
        return redirect()->route('indexDataBeasiswa')->with('dataSuccessDeleted','Data Telah Sukses Di Hapus');
    }
}
