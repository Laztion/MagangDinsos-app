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
        Schema::create('pembimbing_universitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('universitas_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('noTelepon')->nullable();
            $table->string('departemen');
            $table->string('bidangKeahlian')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbing_universitas');
    }
};
