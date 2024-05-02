<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class requestBeasiswaController extends Controller
{
    public function index()
    {
        $data['titlePage'] = 'Notifikasi Beasiswa';
        return view('\admin\notifikasiRequest\index\indexRequestBeasiswa', $data);
    }

    public function create()
    {
        
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
