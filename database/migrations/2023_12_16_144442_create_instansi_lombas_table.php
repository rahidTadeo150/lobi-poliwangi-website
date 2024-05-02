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
        Schema::create('instansi_lomba', function (Blueprint $table) {
            $table->id();
            $table->String('nama_instansi_lomba');
            $table->String('no_telephone');
            $table->String('email');
            $table->String('alamat');
            $table->foreignId('account_admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansi_lomba');
    }
};
