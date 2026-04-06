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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_magang_id')->constrained()->onDelete('cascade');
            $table->foreignId('pembimbing_perusahaan_id')->constrained()->onDelete('cascade');
            $table->foreignId('pembimbing_universitas_id')->constrained()->onDelete('cascade');
            $table->decimal('nilaiKehadiran', 5, 2);
            $table->decimal('nilaiSikap', 5, 2);
            $table->decimal('nilaiKomunikasi', 5, 2);
            $table->decimal('nilaiProaktif', 5, 2);
            $table->decimal('nilaiAkhir', 5, 2);
            $table->text('komentar')->nullable();
            $table->timestamp('tanggalPenilaian')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
