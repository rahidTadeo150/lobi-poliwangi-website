<?php

namespace App\Http\Controllers\web\dataController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class accountAdminController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show()
    {
        $data['account']= auth::guard('userAdmin')->user();
        return view('\admin\auth\profilPageAdmin', $data);
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
