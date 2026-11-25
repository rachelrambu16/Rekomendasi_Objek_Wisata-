<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferensis', function (Blueprint $table) {
            $table->id();

            // Pemilik preferensi
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Lokasi wisata yang diinginkan
            $table->string('lokasi')->nullable();

            // Anggaran maksimal tiket
            $table->decimal('budget', 12, 2)->default(0);

            // Suasana wisata yang disukai
            $table->json('suasana')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferensis');
    }
};
