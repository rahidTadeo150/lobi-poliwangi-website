<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\web\adminController;
use App\Models\instansi_lomba;
use App\Models\lomba;
use App\Models\tingkatan;

class instansiLombaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->codeRequest == 'history') {
            $dataInstansiAll = instansi_lomba::onlyTrashed()->get();
            $jumlahData = $dataInstansiAll->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Instansi"){
                    $dataInstansiAll = instansi_lomba::onlyTrashed()->where('nama_instansi_lomba', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_lomba::onlyTrashed()->where('nama_instansi_lomba', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "No Telephone") {
                    $dataInstansiAll = instansi_lomba::onlyTrashed()->where('no_telephone', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_lomba::onlyTrashed()->where('no_telephone', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($dataInstansiAll->isEmpty()) {
                $dataInstansiAll = null;
            }
            return view('\admin\indexData\instansiLombaIndex', [
                'titlePage' => 'History Data Instansi',
                'jumlahData' => $jumlahData,
                'data' => $dataInstansiAll,
                'codeRequest' => $request->codeRequest,
            ]);
        } else {
            $dataInstansiAll = instansi_lomba::all();
            $jumlahData = $dataInstansiAll->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Instansi"){
                    $dataInstansiAll = instansi_lomba::where('nama_instansi_lomba', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_lomba::where('nama_instansi_lomba', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "No Telephone") {
                    $dataInstansiAll = instansi_lomba::where('no_telephone', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = instansi_lomba::where('no_telephone', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($dataInstansiAll->isEmpty()) {
                $dataInstansiAll = null;
            }
            return view('\admin\indexData\instansiLombaIndex', [
                'titlePage' => 'Index Data Instansi',
                'jumlahData' => $jumlahData,
                'data' => $dataInstansiAll,
                'codeRequest' => $request->codeRequest,
            ]);
        }
    }

    public function create(Request $request)
    {
        $data['titlePage'] = 'Tambah Instansi Lomba';
        $data['redirect'] = $request->redirect;
        return view('\admin\CRUD\create\instansiCreate\formInstansiLomba', $data);
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

        $dataInstansiBaru = instansi_lomba::create([
            'nama_instansi_lomba' => $validateData['namaInstansi'],
            'no_telephone' => $validateData['noTelephone'],
            'email' => $validateData['emailInstansi'],
            'alamat' => $validateData['alamatInstansi'],
            'account_admin_id' => $validateData['accountAdmin'],
        ]);
        if ($request->redirect == 'getInstansiCreate') {
            return redirect(route('getInstansiLomba'))->with('instansiSuccessAdded', 'Data Instansi Telah Di Tambahkan');
        } else {
            return redirect(route('indexInstansiLomba'))->with('instansiSuccessAdded', 'Data Instansi Telah Di Tambahkan');
        }
    }

    public function show($id)
    {
        $data['dataInstansi'] = instansi_lomba::withTrashed()->where('id', $id)->first();
        if($data['dataInstansi']->lomba->isEmpty()) {
            $data['containData'] = false;
        } else {
            $data['containData'] = true;
        }
        return view('\admin\CRUD\read\instansi\previewInstansiLomba', $data);
    }

    public function edit(instansi_lomba $instansi_lomba)
    {
        $dataInstansi = instansi_lomba::where('id', $instansi_lomba->id)->first();
        return view('\admin\CRUD\update\instansiUpdate\formEditLomba', [
            'data' => $dataInstansi,
        ]);
    }

    public function update(Request $request, instansi_lomba $instansi_lomba)
    {
        $validateData = $request->validate([
            'namaIntansi' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'noTelephone' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;

        $wantEditing = instansi_lomba::find($instansi_lomba->id);
        $wantEditing->update([
            'nama_instansi_lomba' => $validateData['namaIntansi'],
            'no_telephone' => $validateData['noTelephone'],
            'email' => $validateData['email'],
            'alamat' => $validateData['alamat'],
            'account_admin_id' => $validateData['accountAdmin'],
        ]);
        return redirect()->intended('/dashboard-admin/index-data-instasi-lomba/preview/' . $wantEditing->id)->with('dataSuccessUpdated','Data Telah Sukses Di Update');
    }

    public function destroy(instansi_lomba $instansi_lomba)
    {
        $dataInstansi = instansi_lomba::find($instansi_lomba->id);
        $accountAdmin = auth('userAdmin')->user()->id;
        $dataInstansi->update([
            'account_admin_id' => $accountAdmin,
        ]);
        $dataInstansi->delete();
        return redirect()->route('indexInstansiLomba')->with('dataSuccessDeleted','Data Telah Sukses Di Nonaktifkan');
    }
}
