<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('pelayanan_id');
            $table->string('biaya_administrasi')->nullable(true)->default(0);
            $table->enum('jenis_bayar', ['tunai', 'transfer'])->default('tunai');
            $table->timestamp('tanggal_pembayaran')->useCurrent();
            $table->enum('keterangan', ['lunas', 'belum_lunas']);
            $table->timestamps();

            $table->foreign('pelayanan_id')
                    ->references('id')
                    ->on('pelayanan')
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
