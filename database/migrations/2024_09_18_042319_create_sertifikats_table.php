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
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->bigIncrements('idsertif')->unique();
            $table->varchar('nama_sertif', 255);
            $table->varchar('no_sertif', 25)->nullable();
            $table->date('tgl_terbit');
            $table->date('tgl_kadaluwarsa')->nullable();
            $table->varchar('instansi', 200);
            $table->varchar('jenis', 25);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikats');
    }
};
