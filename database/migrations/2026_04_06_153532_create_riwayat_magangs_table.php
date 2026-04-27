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
        Schema::create('riwayat_magangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('kegiatan_magang_id')->constrained()->onDelete('cascade');
            $table->date('tanggalMulai');
            $table->date('tanggalSelesai');
            $table->string('divisiTempat');
            $table->string('namaPerusahaan');
            $table->string('namaPembimbingPerusahaan');
            $table->string('statusKompetensi')->nullable();
            $table->decimal('nilaiAkhir', 5, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->datetime('tanggalTercatat')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_magangs');
    }
};
