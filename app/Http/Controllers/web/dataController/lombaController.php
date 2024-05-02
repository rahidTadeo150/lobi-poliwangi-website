<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\instansi_lomba;
use App\Models\tingkatan;
use App\Models\lomba;

class lombaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->codeRequest == "history") {
            $data['dataLombaAll'] = lomba::onlyTrashed()->join('instansi_lomba', 'lomba.instansi_lomba_id', '=', 'instansi_lomba.id')->get();
            $data['jumlahData'] = lomba::onlyTrashed()->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Lomba"){
                    $data['dataLombaAll'] = lomba::onlyTrashed()->where('nama_lomba', 'like', '%' .$request->search. '%')->get();
                    $$data['jumlahData'] = lomba::onlyTrashed()->where('nama_lomba', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "Nama Instansi"){
                    $data['dataLombaAll'] = lomba::onlyTrashed()->join('instansi_lomba', 'lomba.instansi_lomba_id', '=', 'instansi_lomba.id')->where('instansi_lomba.nama_instansi_lomba', 'like', '%' .$request->search. '%')->get();
                    $$data['jumlahData'] = lomba::onlyTrashed()->join('instansi_lomba', 'lomba.instansi_lomba_id', '=', 'instansi_lomba.id')->where('instansi_lomba.nama_instansi_lomba', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($data['dataLombaAll']->isEmpty()) {
                $data['dataLombaAll'] = null;
            }
            $data['titlePage'] = 'History Data Lomba';
            $data['codeRequest'] = $request->codeRequest;
            return view('\admin\indexData\lombaIndexData', $data); 
        } else {
            $data['dataLombaAll'] = lomba::join('instansi_lomba', 'lomba.instansi_lomba_id', '=', 'instansi_lomba.id')->get();;
            $data['jumlahData'] = lomba::all()->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Lomba"){
                    $data['dataLombaAll'] = lomba::where('nama_lomba', 'like', '%' .$request->search. '%')->get();
                    $$data['jumlahData'] = lomba::where('nama_lomba', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "Nama Instansi"){
                    $data['dataLombaAll'] = instansi_lomba::join('instansi_lomba', 'lomba.instansi_lomba_id', '=', 'instansi_lomba.id')->where('instansi_lomba.nama_instansi_lomba', 'like', '%' .$request->search. '%')->get();
                    $$data['jumlahData'] = instansi_lomba::join('instansi_lomba', 'lomba.instansi_lomba_id', '=', 'instansi_lomba.id')->where('instansi_lomba.nama_instansi_lomba', 'like', '%' .$request->search. '%')->count();
                }
            }
            $data['titlePage'] = 'Index Data Lomba';
            $data['codeRequest'] = null;
            return view('\admin\indexData\lombaIndexData', $data);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaLomba' => ['required', 'max:255'],
            'linkPendaftaran' => ['required', 'max:255'],
            'tanggalPenutupan' => ['required'],
            'tingkatan' => ['required'],
            'persyaratan' => ['required', 'max:255'],
            'namaInstansi' => ['required', 'max:255'],
            'dataImage' => ['required', 'image', 'file'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;
        $validateData['dataImage']=$request->file('dataImage')->store('lombaDataImg');
        
        $idInstansi = instansi_lomba::firstOrCreate([
            'nama_instansi_lomba' => $validateData['namaInstansi']
        ]);
        
        lomba::create ([
            'nama_lomba' => $validateData['namaLomba'],
            'instansi_lomba_id' => $idInstansi->id,
            'link_pendaftaran' => $validateData['linkPendaftaran'],
            'persyaratan' => $validateData['persyaratan'],
            'tanggal_penutupan' => $validateData['tanggalPenutupan'],
            'tingkatan_id' => $validateData['tingkatan'],
            'account_admin_id' => $validateData['accountAdmin'],
            'data_foto' => $validateData['dataImage'],
            'status_id' => '1',
        ]);

        return redirect()->route('indexDataLomba')->with('successAddedData', 'Data Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $data['dataLomba'] = lomba::withTrashed()->where('id', $id)->first();
        $data['dataInstansi'] = instansi_lomba::withTrashed()->where('id', $id)->first();
        return view('\admin\CRUD\read\previewLomba', $data);
    }

    public function edit(lomba $lomba)
    {
        $data['dataLomba'] = lomba::where('id', $lomba->id)->first();
        $data['dataInstansi'] = instansi_lomba::where('id', $lomba->instansi_lomba_id)->first();
        $data['dataTingkatan'] = tingkatan::all();
        return view('\admin\CRUD\update\formEditLomba', $data);
    }

    public function update(lomba $lomba, Request $request)
    {
        $validateData = $request->validate([
            'namaLomba' => ['required', 'max:255'],
            'idInstansi' => ['required', 'max:255'],
            'persyaratan' => ['required', 'max:255'],
            'linkPendaftaran' => ['required', 'max:255'],
            'tanggalPenutupan' => ['required'],
            'tingkatan' => ['required'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;
        $validateData['linkPendaftaran']=$request->linkPendaftaran;
        
        $idInstansi = instansi_lomba::firstOrCreate([
            'id' => $validateData['idInstansi']
        ]);

        $wantEditing = lomba::find($lomba->id);
        
        if ($request->file('imageChange'))
        {
            Storage::delete($request->imageNonchange);
            $validateData['dataFoto'] = $request->file('imageChange')->store('lombaDataImg');
            $wantEditing->update([
                'data_foto' => $validateData['dataFoto']
            ]);
        }
        // Proses Update Data Tanpa Data Foto //
        $wantEditing->update([
            'nama_lomba' => $validateData['namaLomba'],
            'instansi_lomba_id' => $idInstansi->id,
            'link_pendaftaran' => $validateData['linkPendaftaran'],
            'persyaratan' => $validateData['persyaratan'],
            'tanggal_penutupan' => $validateData['tanggalPenutupan'],
            'tingkatan_id' => $validateData['tingkatan'],
            'account_admin_id' => $validateData['accountAdmin'],
            'status_id' => '1',
        ]);
        return redirect()->intended('/dashboard-admin/index-data-lomba/preview/' . $wantEditing->id)->with('dataSuccessUpdated','Data Telah Sukses Di Update');
    }

    public function destroy(lomba $lomba, Request $request)
    {
        $dataLomba = lomba::find($lomba->id);
        $dataInstansiLomba = instansi_lomba::find($lomba->instansiLomba->id);
        $dataLomba->delete();
        $dataInstansiLomba->delete();
        return redirect()->route('indexDataLomba')->with('dataSuccessDeleted','Data Telah Sukses Di Hapus');
    }
}
