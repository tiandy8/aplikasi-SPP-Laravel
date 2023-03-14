@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Histori Pembayaran</strong> {{ $siswa->nama }}</h1>
            @if (Auth::user()->getLevel('admin'))

            <div class="">
                <a href="{{ route('admin.laporan.cetak.siswa',$siswa->nisn) }}" class="btn-warning btn">Generate Laporan</a>
            </div>
            @endif
        </div>

        <table class="table">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Petugas</th>
                    <th>Tanggal Bayar</th>
                    <th>Nominal</th>
                    <th>SPP</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                </tr>
           </thead>
          @foreach ($pembayaran as $data )
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->petugas->nama_petugas }}</td>
                    <td>{{ $data->tgl_bayar }}</td>
                    <td>Rp. {{ number_format($data->jumlah_bayar) }}</td>
                    <td>Rp. {{ number_format($data->spp->nominal) }} - {{ $data->spp->tahun }}</td>
                    <td>{{ $data->bulan_bayar }}</td>
                    <td>{{ $data->tahun_dibayar }}</td>

                </tr>
            </tbody>
          @endforeach
        </table>
    </div>
</div>

@endsection
