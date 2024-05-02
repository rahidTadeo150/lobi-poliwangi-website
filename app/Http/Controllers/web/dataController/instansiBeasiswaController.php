<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\instansi_beasiswa;
use App\Models\beasiswa;

class instansiBeasiswaController extends Controller
{
    public function index(Request $request)
    {
        $dataInstansiAll = instansi_beasiswa::onlyTrashed()->get();
        $jumlahData = $dataInstansiAll->count();
        if ($request->codeRequest == 'history') {
            if($request->search) {
                if ($request->typeSearching == "Nama Instansi"){
                    $dataInstansiAll = instansi_beasiswa::onlyTrashed()->where('nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_beasiswa::onlyTrashed()->where('nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "No Telephone") {
                    $dataInstansiAll = instansi_beasiswa::onlyTrashed()->where('no_telephone', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_beasiswa::onlyTrashed()->where('no_telephone', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($dataInstansiAll->isEmpty()) {
                $dataInstansiAll = null;
            }
            return view('\admin\indexData\instansiBeasiswaIndex', [
                'titlePage' => 'History Data Instansi Beasiswa',
                'jumlahData' => $jumlahData,
                'data' => $dataInstansiAll,
                'codeRequest' => $request->codeRequest,
            ]);
        } else {
            $dataInstansiAll = instansi_beasiswa::all();
            $jumlahData = $dataInstansiAll->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Instansi"){
                    $dataInstansiAll = instansi_beasiswa::where('nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_beasiswa::onlyTrashed()->where('nama_instansi_beasiswa', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "No Telephone") {
                    $dataInstansiAll = instansi_beasiswa::where('no_telephone', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_beasiswa::where('no_telephone', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($dataInstansiAll->isEmpty()) {
                $dataInstansiAll = null;
            }
            return view('\admin\indexData\instansiBeasiswaIndex', [
                'titlePage' => 'Index Data Instansi Beasiswa',
                'jumlahData' => $jumlahData,
                'data' => $dataInstansiAll,
                'codeRequest' => $request->codeRequest,
            ]);
        }
    }

    public function create()
    {
        return view('\admin\CRUD\create\instansiCreate\formInstansiBeasiswa', [
            'titlePage' => 'Tambah Instansi Beasiswa'
        ]);
    }

    public function getInstansiBeasiswa(Request $request)
    { 
        if ($request->codeRequest == "update") {
            $data['dataInstansi'] = instansi_beasiswa::all();
            if($request->search) {
                $data['dataInstansi'] = instansi_beasiswa::where('nama_instansi_beasiswa', 'like', '%' . $request->search . '%')->get();
                $data['jumlahData'] = instansi_beasiswa::where('nama_instansi_beasiswa', $request->search)->count();
            }
            if ($data['dataInstansi']->isEmpty()) {
                $data['dataInstansi'] = null;
            }
            $data['idBeasiswa'] = beasiswa::where('id', $request->idBeasiswa)->first();
            $data['redirect'] = $request->redirect;
            return view('\admin\getInstansiBeasiswa\getInstansiUpdate', $data);
        } else {
            $data['dataInstansi'] = instansi_beasiswa::all();
            if($request->search) {
                $data['dataInstansi'] = instansi_beasiswa::where('nama_instansi_beasiswa', 'like', '%' . $request->search . '%')->get();
                $data['jumlahData'] = instansi_beasiswa::where('nama_instansi_beasiswa', $request->search)->count();
            }
            if ($data['dataInstansi']->isEmpty()) {
                $data['dataInstansi'] = null;
            }
            $data['redirect'] = $request->redirect;
            return view('\admin\getInstansiBeasiswa\getInstansiCreate', $data);
        }
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaInstansi' => ['required', 'max:255'],
            'noTelephone' => ['required', 'max:13'],
            'alamatInstansi' => ['required', 'max:255'],
            'emailInstansi' => ['required'],
        ]);
        $validateData['accountAdmin'] = auth('userAdmin')->user()->id;

        instansi_beasiswa::create([
            'nama_instansi_beasiswa' => $validateData['namaInstansi'],
            'no_telephone' => $validateData['noTelephone'],
            'email' => $validateData['emailInstansi'],
            'alamat' => $validateData['alamatInstansi'],
            'account_admin_id' => $validateData['accountAdmin'],
        ]);
        if ($request->redirect == 'getInstansiCreate') {
            return redirect(route('getInstansiBeasiswa'))->with('instansiSuccessAdded', 'Data Instansi Telah Di Tambahkan');
        } else {
            return redirect(route('indexInstansiBeasiswa'))->with('instansiSuccessAdded', 'Data Instansi Telah Di Tambahkan');
        }
    }


    public function show($id)
    {
        $data['dataInstansi'] = instansi_beasiswa::withTrashed()->where('id', $id)->first();
        if($data['dataInstansi']->beasiswa->isEmpty()) {
            $data['containData'] = false;
        } else {
            $data['containData'] = true;
        }
        return view('\admin\CRUD\read\instansi\previewInstansiBeasiswa', $data);
    }


    public function edit(instansi_beasiswa $instansi_beasiswa)
    {
        $dataInstansi = instansi_beasiswa::where('id', $instansi_beasiswa->id)->first();
        return view('\admin\CRUD\update\instansiUpdate\formEditBeasiswa', [
            'data' => $dataInstansi,
        ]);
        
    }

    public function update(Request $request, instansi_beasiswa $instansi_beasiswa)
    {
        $validateData = $request->validate([
            'namaIntansi' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'noTelephone' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;

        $wantEditing = instansi_beasiswa::find($instansi_beasiswa->id);
        $wantEditing->update([
            'nama_instansi_beasiswa' => $validateData['namaIntansi'],
            'no_telephone' => $validateData['noTelephone'],
            'email' => $validateData['email'],
            'alamat' => $validateData['alamat'],
            'account_admin_id' => $validateData['accountAdmin'],
        ]);
        return redirect()->intended('/dashboard-admin/index-data-instansi-beasiswa/preview/' . $wantEditing->id)->with('dataSuccessUpdated','Data Telah Sukses Di Update');

    }

    public function destroy(instansi_beasiswa $instansi_beasiswa)
    {
        $dataInstansi = instansi_beasiswa::find($instansi_beasiswa->id);
        $accountAdmin = auth('userAdmin')->user()->id;
        $dataInstansi->update([
            'account_admin_id' => $accountAdmin,
        ]);
        $dataInstansi->delete();
        return redirect()->route('indexInstansiBeasiswa')->with('dataSuccessDeleted','Data Telah Sukses Di Nonaktifkan');
    }
}
