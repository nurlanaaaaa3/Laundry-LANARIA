<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('transaksi', 'kode_transaksi')) {
            Schema::table('transaksi', function (Blueprint $table) {
                $table->string('kode_transaksi', 20)->nullable()->unique()->after('id_transaksi');
            });
        }

        DB::table('transaksi')->update(['kode_transaksi' => null]);

        $hitung = [];

        $rows = DB::table('transaksi')
            ->orderBy('tanggal_masuk')
            ->orderBy('id_transaksi')
            ->get(['id_transaksi', 'tanggal_masuk']);
        
        foreach ($rows as $row) {
            $tanggal = Carbon::parse($row->tanggal_masuk ?? now());
            $prefix = 'LDR-' . $tanggal->format('ymd') . '-';
            $hitung[$prefix] = ($hitung[$prefix] ?? 0) + 1;

            DB::table('transaksi')
                ->where('id_transaksi', $row->id_transaksi)
                ->update(['kode_transaksi' => $prefix . str_pad($hitung[$prefix], 3, '0', STR_PAD_LEFT)]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('transaksi', 'kode_transaksi')) {
            Schema::table('transaksi', function (Blueprint $table) {
                $table->dropColumn('kode_transaksi');
            });
        }
    }
};
