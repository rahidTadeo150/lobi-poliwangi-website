<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mahasiswa_prestasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mahasiswa_prestasi';
    protected $guarded = ['id'];

    public function prestasi() // Relationship Prestasi Mahasiswa //
    {
        return $this->belongsTo(prestasi::class);
    }
    public function prodi() // Relationship Account Admin //
    {
        return $this->belongsTo(prodi::class);
    }
    public function accountAdmin() // Relationship Account Admin //
    {
        return $this->belongsTo(account_admin::class);
    }
}
