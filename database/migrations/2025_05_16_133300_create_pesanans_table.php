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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('destinasi_id')->constrained();
            $table->string('nama_lengkap');
            $table->string('no_identitas');
            $table->string('no_hp');
            $table->date('tanggal_kunjungan');
            $table->integer('jumlah_tiket');
            $table->decimal('harga_tiket', 10, 2);
            $table->decimal('total_bayar', 10, 2);
            $table->string('status')->default('pending');
            $table->string('kode_booking')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
