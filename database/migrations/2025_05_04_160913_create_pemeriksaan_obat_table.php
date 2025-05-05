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
        Schema::create('pemeriksaan_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('pemeriksaan_id');
            $table->string('dosis')->nullable(false);
            $table->timestamps();

            $table->foreign('obat_id')
                ->references('id')
                ->on('obat')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('pemeriksaan_id')
                ->references('id')
                ->on('pemeriksaan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_obat');
    }
};
