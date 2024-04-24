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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('judulFoto');
            $table->string('deskripsiFoto');
            $table->string('lokasiFile');
            $table->date('tanggalDiunggah');

            $table->foreignId('user_id');
            $table->foreignId('album_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->foreign('album_id')->references('id')->on('albums');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
