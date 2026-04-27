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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('statusKeaktifan')->default(true);
            $table->string('nama');
            $table->string('nim')->unique();
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat')->nullable()
                ->comment('Alamat lengkap mahasiswa');
            $table->date('tanggalLahir');
            $table->string('tempatLahir');
            $table->string('email')->unique();
            $table->string('noTelepon')->nullable();
            $table->foreignId('universitas_id')->constrained()->onDelete('cascade');
            $table->string('fakultas')->nullable();
            $table->string('programStudi')->nullable();
            $table->string('kelas');
            $table->string('semester');
            $table->timestamp('tanggalDaftar')->useCurrent();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
