<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_prestasi extends Model
{
    use HasFactory;
    protected $table = 'request_prestasi';
    protected $guarded = ['id'];
}
