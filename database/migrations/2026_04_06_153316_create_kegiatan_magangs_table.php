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
        Schema::create('kegiatan_magangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('perusahaan_id')->constrained()->onDelete('cascade');
            $table->foreignId('pembimbing_universitas_id')->constrained()->onDelete('cascade');
            $table->foreignId('pembimbing_perusahaan_id')->constrained()->onDelete('cascade');
            $table->string('judulKegiatan');
            $table->datetime('tanggalMulai');
            $table->datetime('tanggalSelesai');
            $table->integer('durasiHari');
            $table->string('divisiTempat');
            $table->text('deskripsiTugas');
            $table->string('dokumentasi')->nullable();
            $table->string('statusKegiatan')->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_magangs');
    }
};
