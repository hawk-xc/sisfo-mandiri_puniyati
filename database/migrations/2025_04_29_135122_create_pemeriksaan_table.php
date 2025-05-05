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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('pendaftaran_id');
            $table->unsignedBigInteger('pembayaran_id');
            $table->unsignedBigInteger('bidan_id');
            $table->unsignedBigInteger('pelayanan_id');
            $table->string('keluhan', 200)->nullable(true);
            $table->string('riwayat', 200)->nullable(true);
            $table->string('riwayat_imunisasi')->nullable(true);
            $table->integer('tensi')->nullable(true);
            $table->integer('bb')->nullable(true);
            $table->integer('tb')->nullable(true);
            $table->integer('suhu_badan')->nullable(true);
            $table->integer('saturasi_oksigen')->nullable(true);
            $table->integer('lila')->nullable(true);
            $table->date('hpht')->nullable(true);
            $table->string('gpa', 10)->nullable(true);
            $table->integer('umur_kehamilan')->nullable(true);
            $table->integer('lingkar_perut')->nullable(true);
            $table->integer('tinggi_fundus')->nullable(true);
            $table->integer('jumlah_anak')->nullable(true);
            $table->enum('persalinan_terakhir', ['normal', 'caesar', 'bantuan_alat'])->nullable(true);
            $table->integer('djj')->nullable(true);
            $table->string('refla', 30)->nullable(true);
            $table->string('lab', 200)->nullable(true);
            $table->date('tanggal_melahirkan')->nullable(true);
            $table->string('tempat_persalinan')->nullable(true);
            $table->enum('bantu_persalinan', ['dokter', 'bidan'])->nullable(true);
            $table->string('besar_rahim')->nullable(true);
            $table->string('cairan_keluar', 50)->nullable(true);
            $table->string('infeksi', 20)->nullable(true);
            $table->string('diagnosa')->nullable(true);
            $table->string('tindakan')->nullable(true);
            $table->date('tanggal_kontrol')->nullable(true);
            $table->timestamps();

            $table->foreign('pendaftaran_id')
                ->references('id')
                ->on('pendaftaran')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('pembayaran_id')
                ->references('id')
                ->on('pendaftaran')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('bidan_id')
                ->references('id')
                ->on('bidan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

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
        Schema::dropIfExists('pemeriksaan');
    }
};
