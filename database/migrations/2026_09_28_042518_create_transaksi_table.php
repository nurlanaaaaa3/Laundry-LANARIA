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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_user')->nullable();

            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_selesai')->nullable();

            $table->integer('total')->default(0);
            $table->integer('dibayar')->default(0);
            $table->integer('dikembalikan')->default(0);

            $table->enum('status_pembayaran', ['belum_lunas'])->default('belum_lunas');
            $table->enum('status_laundry', ['menunggu', 'diproses', 'selesai', 'diambil'])->default('menunggu');

            $table->text('catatan')->nullable();

            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_user')
                  ->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
