<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekomendasi_history_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('history_id')
                ->constrained('rekomendasi_histories')
                ->cascadeOnDelete();

            $table->foreignId('wisata_id')
                ->constrained('wisatas')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['history_id', 'wisata_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_history_items');
    }
};
