<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class instansi_beasiswa extends Model
{
    use HasFactory, SoftDeletes;

    // Spesifikasi Query Table //
    protected $table = 'instansi_beasiswa';
    protected $guarded = ['id'];

    public function beasiswa() // Relationship Beasiswa //
    {
        return $this->hasMany(beasiswa::class);
    }
    public function accountAdmin() // Relationship Beasiswa //
    {
        return $this->belongsTo(account_admin::class);
    }
}
