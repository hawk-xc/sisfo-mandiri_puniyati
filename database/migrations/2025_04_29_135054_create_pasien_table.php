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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nik')->nullable(false);
            $table->string('nama_kk', 50)->nullable(false);
            $table->string('nama', 50)->nullable(false);
            $table->string('tempat_lahir', 20)->nullable(true);
            $table->date('tanggal_lahir')->nullable(true);
            $table->text('alamat')->nullable(true);
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu']);
            $table->enum('pendidikan', ['belum sekolah', 'sd', 'smp/sltp', 'sma/slta', 'diploma i/ii/iii', 's1/s2/s3', 'lain-lain']);
            $table->enum('pekerjaan', ['wiraswasta', 'pns', 'ibu rumah tangga', 'pelajar', 'mahasiswa', 'petani', 'pedagang', 'tidak bekerja']);
            $table->string('penanggung_jawab', 50);
            $table->enum('golda', ['A', 'B', 'AB', 'O']);
            $table->string('no_telp', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
