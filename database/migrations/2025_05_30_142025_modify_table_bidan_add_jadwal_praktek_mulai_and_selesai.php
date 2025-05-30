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
        Schema::table('bidan', function (Blueprint $table) {
            $table->string('jadwal_praktek_mulai')->nullable();
            $table->string('jadwal_praktek_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bidan', function (Blueprint $table) {
            $table->dropColumn(['jadwal_praktek_mulai', 'jadwal_praktek_selesai']);
        });
    }
};
