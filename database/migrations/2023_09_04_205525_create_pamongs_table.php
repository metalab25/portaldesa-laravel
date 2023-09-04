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
        Schema::create('pamongs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('warga')->default('1');
            $table->foreignId('penduduk_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->foreignId('kelamin_id')->nullable();
            $table->foreignId('pendidikan_kk_id')->nullable();
            $table->foreignId('agama_id')->nullable();
            $table->string('nipd')->nullable();
            $table->string('jabatan');
            $table->date('tgl_pengangkatan')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->string('masa_jabatan')->nullable();
            $table->string('golongan')->nullable();
            $table->text('tupoksi')->nullable();
            $table->tinyInteger('ttd')->nullable();
            $table->tinyInteger('ub')->nullable();
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pamongs');
    }
};
