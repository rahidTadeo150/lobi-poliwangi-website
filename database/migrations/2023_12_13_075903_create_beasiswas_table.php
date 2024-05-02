<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beasiswa', function (Blueprint $table) {

            // Description Table Beasiswa //
            $table->id();
            $table->String('nama_beasiswa');
            $table->foreignId('instansi_beasiswa_id');
            $table->String('link_pendaftaran');
            $table->text('persyaratan');
            $table->date('tanggal_penutupan');
            $table->String('data_foto');
            $table->foreignId('tingkatan_id');
            $table->foreignId('status_id');
            $table->foreignId('account_admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
