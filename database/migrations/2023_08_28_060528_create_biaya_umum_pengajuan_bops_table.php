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
        Schema::create('biaya_umum_pengajuan_bop', function (Blueprint $table) {
            $table->id();
            $table->string('unsurbiaya')->nullable();
            $table->date('tanggal')->nullable();
            $table->bigInteger('pengajuan')->nullable();
            $table->bigInteger('realisasi')->nullable();
            $table->bigInteger('realisasi_pengeluaran')->nullable();
            $table->bigInteger('sisa')->nullable();
            $table->bigInteger('sisa_pengeluaran')->nullable();
            $table->string('petugas')->nullable();
            $table->string('detailbiaya')->nullable();
            $table->string('detailinternet')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('keterangan_pengeluaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_umum_pengajuan_bop');
    }
};
