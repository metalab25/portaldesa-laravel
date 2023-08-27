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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi');
            $table->string('admin_title');
            $table->string('login_title');
            $table->string('website_title');
            $table->string('sebutan_kabupaten');
            $table->string('singkatan_kabupaten');
            $table->string('sebutan_kecamatan');
            $table->string('sebutan_kepala_kecamatan');
            $table->string('singkatan_kecamatan');
            $table->string('sebutan_desa');
            $table->string('sebutan_kepala_desa');
            $table->string('sebutan_dusun');
            $table->string('sebutan_kepala_dusun');
            $table->string('format_nomor_surat')->default('[kode_surat]/[nomor_surat, 3]/PEM/[tahun]');
            $table->string('artikel_per_page')->default('8');
            $table->string('timezone')->default('Asia/Jakarta');
            $table->string('current_version');
            $table->string('copyright_desa');
            $table->string('banner_login')->default('no-picture.webp');
            $table->string('background_login')->default('no-picture.webp');
            $table->string('footer_aplikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
