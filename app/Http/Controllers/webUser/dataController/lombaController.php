<?php

namespace App\Http\Controllers\webUser\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\lomba;

class lombaController extends Controller
{
    public function index()
    {
        $data['lombaAll'] = lomba::all(); 
        $data['jumlahLomba'] = lomba::all()->count();
        $data['jumlahLokal'] = lomba::where('tingkatan_id', 1)->count();
        $data['jumlahInternasional'] = lomba::where('tingkatan_id', 2)->count();
        $data['lombaTerbaru'] = lomba::latest('created_at')->take(3)->get();
        if ($data['lombaAll']->isEmpty()) {
            $data['lombaAll'] = null;
        }
        if ($data['lombaTerbaru']->isEmpty()) {
            $data['lombaTerbaru'] = null;
        }
        $data['account'] = auth::guard('mahasiswa')->user();
        return view('\user\indexData\indexLomba', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(lomba $lomba)
    {
        $data['dataLomba'] = lomba::where('id',   $lomba->id)->first();
        if (!$data['dataLomba']) {
            $data['dataLomba']= null;
        }
        return view('\user\detailsData\lombaDetails', $data);
    }

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
