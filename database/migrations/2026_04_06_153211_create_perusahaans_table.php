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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('namaPerusahaan');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('email')->nullable();
            $table->string('sektorIndustri')->nullable();
            $table->string('namaPIC')->nullable();
            $table->string('kontakPIC')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
