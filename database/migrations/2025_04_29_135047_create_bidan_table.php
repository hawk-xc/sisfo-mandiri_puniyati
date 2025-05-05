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
        Schema::create('bidan', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nama', 50)->nullable(false);
            $table->string('alamat', 100)->nullable(true);
            $table->string('no_telp', 13)->nullable(true);
            $table->string('jadwal_praktek')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidan');
    }
};
