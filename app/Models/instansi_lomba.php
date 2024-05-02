<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class instansi_lomba extends Model
{
    use HasFactory, SoftDeletes;

    // Spesifikasi Query Table //
    protected $table = 'instansi_lomba';
    protected $guarded = ['id'];

    // Relationship //
    public function lomba()
    {
        return $this->hasMany(lomba::class);
    }
    public function accountAdmin()
    {
        return $this->belongsTo(account_admin::class);
    }
}
