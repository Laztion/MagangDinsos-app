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
        Schema::create('kartu_magangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('kegiatan_magang_id')->constrained()->onDelete('cascade');
            $table->foreignId('universitas_id')->constrained()->onDelete('cascade');
            $table->date('tanggalMulai');
            $table->date('tanggalSelesai');
            $table->string('statusKartu')->default('aktif');
            $table->date('tanggalCetak')->nullable();
            $table->date('tanggalCetakUlang')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_magangs');
    }
};
