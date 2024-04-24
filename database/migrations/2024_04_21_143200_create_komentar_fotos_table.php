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
        Schema::create('komentar_fotos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id');            
             $table->foreignId('foto_id');
             $table->string('isiKomentar')->nullable();
             $table->foreign('user_id')->references('id')->on('users');
                     
            $table->foreign('foto_id')->references('id')->on('fotos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar_fotos');
    }
};
