@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

        <p>Selamat datang di aplikasi SPP, disini anda dapat memanage data siswa, petugas, laporan, kelas, spp dll.</p>
        <table class="table">
            <tr class="mt-3">
                <td width="200">Nama</td>
                <td width='25'>:</td>
                <td>{{ Auth::user()->nama_petugas }}</td>
            </tr>
            <tr class="mt-3">
                <td width="200">Level</td>
                <td width='25'>:</td>
                <td>{{ Auth::user()->level }}</td>
            </tr>
            <tr class="mt-3">
                <td width="200">Tanggal Login</td>
                <td width='25'>:</td>
                <td>{{ date('d-m-Y') }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection
