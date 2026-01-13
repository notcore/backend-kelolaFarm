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
        Schema::create('lahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("tanah_id")->constrained("tanahs")->onDelete("cascade");
            $table->foreignId("daerah_id")->constrained("daerahs")->onDelete("cascade");
            $table->string("nama_lahan");
            $table->decimal("hektar", 8,2);
            $table->string("gambar_lahan")->default('lahan/default.jpg');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lon', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahans');
    }
};
