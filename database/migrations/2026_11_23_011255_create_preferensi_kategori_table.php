<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferensi_kategori', function (Blueprint $table) {
            $table->id();

            // Menghubungkan ke preferensi pengguna
            $table->foreignId('preferensi_id')
                  ->constrained('preferensis')
                  ->cascadeOnDelete();

            // Menghubungkan ke kategori wisata
            $table->foreignId('kategori_id')
                  ->constrained('kategoris')
                  ->cascadeOnDelete();

            $table->timestamps();

            // Mencegah kategori yang sama dipilih dua kali
            $table->unique(['preferensi_id', 'kategori_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferensi_kategori');
    }
};
