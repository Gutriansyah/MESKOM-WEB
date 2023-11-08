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
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string("nama_wisata");
            $table->string("alamat");
            $table->text("deskripsi")->nullable();
            $table->string("lokasi")->nullable();
            $table->string("gambar_1")->nullable();
            $table->string("gambar_2")->nullable();
            $table->string("gambar_3")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
