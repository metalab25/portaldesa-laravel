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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('nik', 16, 0);
            $table->foreignId('keluarga_id')->nullable();
            $table->decimal('no_kk_sebelumnya', 16, 0)->nullable();
            $table->foreignId('hubungan_keluarga_id');
            $table->foreignId('kelamin_id');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');
            $table->foreignId('agama_id');
            $table->foreignId('pendidikan_kk_id');
            $table->foreignId('pendidikan_tempuh_id')->nullable();
            $table->foreignId('pekerjaan_id');
            $table->foreignId('status_kawin_id');
            $table->foreignId('kewarganegaraan_id');
            $table->string('dokumen_pasport')->nullable();
            $table->date('tanggal_akhir_paspor')->nullable();
            $table->string('dokumen_kitas')->nullable();
            $table->decimal('nik_ayah', 16, 0)->nullable();
            $table->string('nama_ayah')->nullable();
            $table->decimal('nik_ibu', 16, 0)->nullable();
            $table->string('nama_ibu')->nullable();
            $table->foreignId('darah_id')->nullable();
            $table->foreignId('status_penduduk_id')->nullable();
            $table->foreignId('hamil_id')->nullable();
            $table->foreignId('cacat_id')->nullable();
            $table->foreignId('sakit_id')->nullable();
            $table->string('akta_lahir')->nullable();
            $table->string('akta_perkawinan')->nullable();
            $table->date('tanggal_perkawinan')->nullable();
            $table->string('akta_perceraian')->nullable();
            $table->date('tanggal_perceraian')->nullable();
            $table->foreignId('kb_id')->nullable();
            $table->string('telepon')->nullable();
            $table->text('alamat_sebelumnya')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->foreignId('ktp_id');
            $table->foreignId('status_ktp_id')->nullable();
            $table->string('waktu_lahir')->nullable();
            $table->foreignId('tempat_dilahirkan_id')->nullable();
            $table->foreignId('jenis_kelahiran_id')->nullable();
            $table->foreignId('penolong_kelahiran_id')->nullable();
            $table->tinyInteger('anak_ke')->nullable();
            $table->string('berat_lahir')->nullable();
            $table->string('panjang_lahir')->nullable();
            $table->string('tag_id_ktp')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('status_dasar_id')->default('1');
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
