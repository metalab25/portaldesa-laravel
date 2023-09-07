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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('title')->default('150');
            $table->string('slug');
            $table->text('excerpt');
            $table->longText('body');
            $table->string('image');
            $table->string('caption_image')->nullable();
            $table->string('pemberi_sambutan')->nullable();
            $table->string('jabatan_sambutan')->nullable();
            $table->string('foto_sambutan')->nullable();
            $table->string('image1')->nullable();
            $table->string('caption_image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('caption_image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('caption_image3')->nullable();
            $table->string('link_embed')->nullable();
            $table->string('sumber_berita')->nullable();
            $table->string('link_sumber_berita')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('link_dokumen')->nullable();
            $table->integer('komentar')->default('1')->nullable();
            $table->integer('by_warga')->default('0')->nullable();
            $table->timestamp('tgl_agenda')->nullable();
            $table->integer('views')->default('0')->nullable();
            $table->integer('headline')->default('0')->nullable();
            $table->integer('status')->default('1')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
