<?php

namespace App\Http\Controllers\web\dataController;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\prodi;
use App\Models\jurusan;
use App\Models\prestasi;
use App\Models\mahasiswa_prestasi;


class prestasiModelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->codeRequest == 'history') {
            $dataPrestasiAll = mahasiswa_prestasi::onlyTrashed()->get();
            $jumlahData = mahasiswa_prestasi::onlyTrashed()->count();
            if ($request->typeSearching == "Nama Mahasiswa"){
                $dataPrestasiAll = mahasiswa_prestasi::onlyTrashed()->where('nama_mahasiswa', 'like', '%' .$request->search. '%')->get();
                $jumlahData = mahasiswa_prestasi::onlyTrashed()->where('nama_mahasiswa', 'like', '%' .$request->search. '%')->count();
            }
            if ($request->typeSearching == "Nim"){
                $dataPrestasiAll = mahasiswa_prestasi::onlyTrashed()->where('nim', 'like', '%' .$request->search. '%')->get();
                $jumlahData = mahasiswa_prestasi::onlyTrashed()->where('nim', 'like', '%' .$request->search. '%')->count();
            }
            if ($dataPrestasiAll->isEmpty()) {
                $dataPrestasiAll = null;
            }
            return view('\admin\indexData\prestasiMahasiswaIndexData', [
                'titlePage' => 'Index Prestasi Mahasiswa',
                'data' => $dataPrestasiAll,
                'jumlahData' => $jumlahData,
            ]);
        } else {
            $dataPrestasiAll = mahasiswa_prestasi::all();
            $jumlahData = mahasiswa_prestasi::all()->count();
            if($request->search) {
                if ($request->typeSearching == "Nama Mahasiswa"){
                    $dataPrestasiAll = mahasiswa_prestasi::where('nama_mahasiswa', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = mahasiswa_prestasi::where('nama_mahasiswa', 'like', '%' .$request->search. '%')->count();
                }
                if ($request->typeSearching == "Nim"){
                    $dataPrestasiAll = mahasiswa_prestasi::where('nim', 'like', '%' .$request->search. '%')->get();
                    $jumlahData = mahasiswa_prestasi::where('nim', 'like', '%' .$request->search. '%')->count();
                }
            }
            if ($dataPrestasiAll->isEmpty()) {
                $dataPrestasiAll = null;
            }
            return view('\admin\indexData\prestasiMahasiswaIndexData', [
                'titlePage' => 'Index Prestasi Mahasiswa',
                'data' => $dataPrestasiAll,
                'jumlahData' => $jumlahData,
            ]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'nimMahasiswa' => ['required'],
            'namaPerlombaan' => ['required', 'max:255'],
            'namaPrestasi' => ['required', 'max:255'],
            'tingkatan' => ['required', 'max:255'],
            'tanggalPerlombaan' => ['required'],
            'dataImage' => ['required', 'file', 'image'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;
        $validate_data['dataImage']=$request->file('dataImage')->store('buktiPrestasi');

        $getApiMahasiswa = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa/' . $validate_data['nimMahasiswa'];
        $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
        $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
        $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
        $dataMahasiswa =  $contentArrayMahasiswa['data'][0];

        
        $jurusanId = jurusan::firstOrCreate([
            'nama_jurusan' => $dataMahasiswa['prodi']['jurusan']['nama_jurusan'],
        ]);
        $prodiId = prodi::firstOrCreate([
            'nama_prodi' => $dataMahasiswa['prodi']['nama_prodi'],
            'jurusan_id' => $jurusanId->id,
        ]);
        $prestasiId = prestasi::firstOrCreate([
            'nama_perlombaan_prestasi' => $validate_data['namaPerlombaan'],
            'nama_prestasi' => $validate_data['namaPrestasi'],
            'tanggal_perlombaan' => $validate_data['tanggalPerlombaan'],
            'foto_bukti_prestasi' => $validate_data['dataImage'],
            'tingkatan_id' => $validate_data['tingkatan'],
        ]);

        
        $image = file_get_contents($dataMahasiswa['foto_mahasiswa']);
        $namaImage = pathinfo($dataMahasiswa['foto_mahasiswa'], PATHINFO_BASENAME);
        $newImagePath = 'fotoMahasiswa/' . $namaImage;
        Storage::put($newImagePath, $image);

        mahasiswa_prestasi::create([
            'nim' =>  $dataMahasiswa['nim'],
            'nama_mahasiswa' => $dataMahasiswa['nama_mahasiswa'],
            'foto_mahasiswa' => $newImagePath,
            'prodi_id' => $prodiId->id,
            'prestasi_id' => $prestasiId->id,
            'account_admin_id' => $validateData['accountAdmin'],
        ]);
        return redirect(route('indexDataPrestasi'));
    }

    public function show($nim)
    {   
        $dataPrestasi = mahasiswa_prestasi::where('nim', $nim)->first();
        if (!$dataPrestasi) {
            $dataPrestasi = null;
        }
        return view ('\admin\CRUD\read\previewPrestasiMahasiswa', [
            'data' => $dataPrestasi,
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(mahasiswa_prestasi $mahasiswa_prestasi, Request $request)
    {
        $validateData = $request->validate([
            'nimMahasiswa' => ['required', 'max:255'],
            'namaPerlombaan' => ['required', 'max:255'],
            'namaPrestasi' => ['required', 'max:255'],
            'tingkatan' => ['required', 'max:255'],
            'tanggalPerlombaan' => ['required'],
            'imageNonchange' => ['required'],
            'imageChange' => ['file', 'image'],
        ]);
        $validateData['accountAdmin']=auth('userAdmin')->user()->id;

        $dataImg = $validateData['imageNonchange'];
        if($request->file('imageChange')){
            $dataImg = $request->file('imageChange')->store('buktiPrestasi');
        }

        $getApiMahasiswa = new Client();
        $urlApi = 'http://127.0.0.1:8000/api/get-data-mahasiswa/' . $validateData['nimMahasiswa'];
        $responseMahasiswa = $getApiMahasiswa->request('GET', $urlApi);
        $contentMahasiswa = $responseMahasiswa->getBody()->getContents();
        $contentArrayMahasiswa = json_decode($contentMahasiswa, true);
        $dataMahasiswa =  $contentArrayMahasiswa['data'][0];

        $wantUpdating = mahasiswa_prestasi::find($mahasiswa_prestasi->id);

        $prestasiId = prestasi::firstOrCreate([
            'nama_perlombaan_prestasi' => $validateData['namaPerlombaan'],
            'nama_prestasi' => $validateData['namaPrestasi'],
            'tanggal_perlombaan' => $validateData['tanggalPerlombaan'],
            'foto_bukti_prestasi' => $dataImg,
            'tingkatan_id' => $validateData['tingkatan'],
        ]);


        $jurusanId = jurusan::firstOrCreate([
            'nama_jurusan' => $dataMahasiswa['prodi']['jurusan']['nama_jurusan'],
        ]);
        
        $prodiId = prodi::firstOrCreate([
            'nama_prodi' => $dataMahasiswa['prodi']['nama_prodi'],
            'jurusan_id' => $jurusanId->id,
        ]);

        $wantUpdating->update([
            'nim' => $dataMahasiswa['nim'],
            'nama_mahasiswa' => $dataMahasiswa['nama_mahasiswa'],
            'jurusan_id' => $jurusanId->id,
            'prestasi_id' => $prestasiId->id,
            'account_admin_id' => $validateData['accountAdmin'],
        ]);
        return redirect(route('indexDataPrestasi'));
    }

    public function destroy(mahasiswa_prestasi $mahasiswa_prestasi)
    {
        $dataPrestasi = mahasiswa_prestasi::find($mahasiswa_prestasi->id);
        $dataPrestasi->delete();
        return redirect()->route('indexDataPrestasi')->with('dataSuccessDeleted','Data Telah Sukses Di Hapus');
    }
}
