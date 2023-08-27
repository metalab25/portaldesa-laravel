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
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('website');
            $table->string('kode_desa');
            $table->string('nama_kepala_desa');
            $table->string('niap_kepala_desa');
            $table->string('telepon_kepala_desa');
            $table->string('kodepos', 6);
            $table->string('nama_kecamatan');
            $table->string('kode_kecamatan');
            $table->string('nama_kepala_camat');
            $table->string('nip_kepala_camat');
            $table->string('nama_kabupaten');
            $table->string('kode_kabupaten');
            $table->foreignId('provinsi_id');
            $table->string('logo');
            $table->string('ttd')->nullable();
            $table->string('banner')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('path')->nullable();
            $table->string('zoom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};
