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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_urut')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->foreignId('klasifikasi_surat_id')->nullable();
            $table->date('tanggal_penerimaan');
            $table->date('tanggal_surat');
            $table->string('pengirim')->nullable();
            $table->string('perihal_surat')->nullable();
            $table->string('attach')->nullable();
            $table->foreignId('pamong_id')->nullable();
            $table->string('isi_disposisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
