<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Custom Auth Config //
use Illuminate\Foundation\Auth\User as Model;

class account_admin extends Model
{
    use HasFactory;

    // Spesifikasi Query Table //
    protected $table = 'account_admin';
    protected $guarded = ['id'];

    // Casting Table Description //
    protected $casts = [
        'password' => 'hashed', // Password Hashing //
    ];

    public function beasiswa() 
    {
        return $this->hasMany(beasiswa::class);
    }
    public function lomba() 
    {
        return $this->hasMany(lomba::class);
    }
    public function mahasiswaPrestasi() 
    {
        return $this->hasMany(mahasiswa_prestasi::class);
    }
    public function instansiBeasiswa() 
    {
        return $this->hasMany(instansi_beasiswa::class);
    }
}
