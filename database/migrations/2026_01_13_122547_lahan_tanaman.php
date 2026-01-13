<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lahan_tanaman', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lahan_id')
                ->constrained('lahans')
                ->cascadeOnDelete();

            $table->foreignId('tanaman_id')
                ->constrained('tanamen')
                ->cascadeOnDelete();

            $table->integer('jumlah');

            $table->timestamps();

            $table->unique(['lahan_id', 'tanaman_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lahan_tanaman');
    }
};
