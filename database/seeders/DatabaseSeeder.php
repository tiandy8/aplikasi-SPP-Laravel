<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'XII RPL A',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        DB::table('petugas')->insert([
            'username' => 'admin',
            'nama_petugas' => 'admin',
            'level' => 'admin',
            'password' => bcrypt('123'),
        ]);

        DB::table('siswa')->insert([
            'nisn' => "1111111111",
            'nis' => "11111111",
            'nama' => 'Christiandy nathannael',
            'id_kelas' => 1,
            'alamat' => 'margorejo metro selatan lampung',
            'no_telp' => '085788961266',
            'password' => bcrypt('123'),
        ]);

        DB::table('pembayaran')->insert([
            'nisn' => "1111111111",
            'id_petugas' => '1',
            'id_spp' => '1',
            'tahun_dibayar' => '2023',
            'tgl_bayar' => '2023-01-01',
            'bulan_bayar' => 'januari',
            'jumlah_bayar' => '1000',
        ]);

    }
}
