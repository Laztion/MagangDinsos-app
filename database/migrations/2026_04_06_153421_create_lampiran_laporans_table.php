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
        Schema::create('lampiran_laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_kegiatan_id')->constrained()->onDelete('cascade');
            $table->string('namaFile');
            $table->string('tipeFile');
            $table->string('urlFile');
            $table->timestamp('tanggalUpload')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_laporans');
    }
};
