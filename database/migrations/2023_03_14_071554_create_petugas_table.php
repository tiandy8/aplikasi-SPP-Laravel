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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('id_petugas');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('nama_petugas')->nullable();
            $table->enum('level',['admin','petugas'])->nullable();
        });

        DB::unprepared('CREATE TRIGGER `ins_petugas` AFTER INSERT ON `petugas` FOR EACH ROW INSERT INTO logs (`pesan`, `tanggal`) VALUES ("Tambah data petugas", NOW())');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
