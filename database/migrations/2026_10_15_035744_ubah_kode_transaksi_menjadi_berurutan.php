<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Kosongkan dlu supaya penomeran ulang tidak bentrok dengan kode lama
        DB::table('transaksi')->update(['kode_transaksi' => null]);

        // Beri nomer berurutan 
        $nomor = 0;

        $rows = DB::table('transaksi')
            ->orderBy('tanggal_masuk')
            ->orderBy('id_transaksi')
            ->get(['id_transaksi']);

        foreach ($rows as $row) {
            $nomor++;

            DB::table('transaksi')
                ->where('id_transaksi', $row->id_transaksi)
                ->update(['kode_transaksi' => 'LDR-' . str_pad($nomor, 3, '0', STR_PAD_LEFT)]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak ada yang perlu dikembalikan
    }
};
