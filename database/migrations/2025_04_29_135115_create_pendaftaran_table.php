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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('pasien_id');
            $table->string('no_rm');
            $table->date('tanggal');
            $table->enum('status', ['selesai', 'menunggu']);
            $table->timestamps();

            $table->foreign('pasien_id')
            ->references('id')
            ->on('pasien')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
