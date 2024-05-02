<?php

namespace App\Http\Controllers\webUser\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\beasiswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class beasiswaController extends Controller
{

    public function index()
    {
        $data['beasiswaAll'] = beasiswa::all();
        $data['jumlahBeasiswa'] = beasiswa::all()->count();
        $data['jumlahLokal'] = beasiswa::where('tingkatan_id', 1)->count();
        $data['jumlahInternasional'] = beasiswa::where('tingkatan_id', 2)->count();
        $data['beasiswaTerbaru'] = beasiswa::latest('created_at')->take(3)->get();
        if ($data['beasiswaAll']->isEmpty()) {
            $data['beasiswaAll'] = null;
        }
        if ($data['beasiswaTerbaru']->isEmpty()) {
            $data['beasiswaTerbaru'] = null;
        }
        $data['account'] = auth::guard('mahasiswa')->user();
        return view('\user\indexData\indexBeasiswa', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(beasiswa $beasiswa)
    {
        $data['dataBeasiswa'] = beasiswa::where('id',   $beasiswa->id)->first();
        if (!$data['dataBeasiswa']) {
            $data['dataBeasiswa']= null;
        }
        return view('\user\detailsData\beasiswaDetails', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
