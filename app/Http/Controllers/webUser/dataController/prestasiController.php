<?php

namespace App\Http\Controllers\webUser\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mahasiswa_prestasi;
use Illuminate\Support\Facades\Auth;

class prestasiController extends Controller
{
    public function index()
    {
        $data['prestasiAll'] = mahasiswa_prestasi::all();
        if ($data['prestasiAll']->isEmpty()) {
            $data['prestasiAll'] = null;
        }
        $data['account'] = auth::guard('mahasiswa')->user();
        return view('\user\indexData\indexPrestasi', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
