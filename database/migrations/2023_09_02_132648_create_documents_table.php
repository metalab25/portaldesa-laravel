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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_type_id');
            $table->string('name');
            $table->string('slug');
            $table->string('attach')->nullable();
            $table->text('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->string('jenis')->nullable();
            $table->string('no_tetapan')->nullable();
            $table->date('tgl_tetapan')->nullable();
            $table->string('no_keputusan')->nullable();
            $table->date('tgl_keputusan')->nullable();
            $table->date('tgl_sepakat')->nullable();
            $table->string('no_laporkan')->nullable();
            $table->date('tgl_laporkan')->nullable();
            $table->string('no_lembaran_diundangkan')->nullable();
            $table->date('tgl_lembaran_diundangkan')->nullable();
            $table->string('no_berita_diundangkan')->nullable();
            $table->date('tgl_berita_diundangkan')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
