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
        Schema::create('letter', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->enum('tipe_surat', ['masuk', 'keluar'])->nullable();
            $table->string('file')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter');
    }
};
