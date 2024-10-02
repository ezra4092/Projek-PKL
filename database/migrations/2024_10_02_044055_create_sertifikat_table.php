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
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->bigIncrements('idsertif');
            $table->string('nama_sertif', 255);
            $table->string('no_sertif', 25)->nullable();
            $table->date('tgl_terbit');
            $table->date('tgl_kadaluwarsa')->nullable();
            $table->string('instansi', 200);
            $table->string('jenis', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat');
    }
};
