<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_petugas')->index();
            $table->foreignId('id_spp')->index();
            $table->char('nisn',10)->index();
            $table->date('tgl_bayar');
            $table->string('bulan_bayar');
            $table->string('tahun_dibayar',4);
            $table->integer('jumlah_bayar');
        });

        DB::unprepared("CREATE TRIGGER ins_pembayaran AFTER INSERT ON pembayaran FOR EACH ROW INSERT INTO logs (pesan,tanggal) VALUES ('Tambah data coy',NOW())");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
