<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->decimal('harga_tiket', 12, 2)->default(0);
            $table->json('suasana')->nullable();
            $table->text('alamat')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->index('lokasi');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};