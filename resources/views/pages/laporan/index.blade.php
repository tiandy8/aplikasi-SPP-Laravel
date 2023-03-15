@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Laporan</strong></h1>
            @if (Auth::user()->getLevel('admin'))
                <div class="">
                    <a href="{{ route('admin.laporan.cetak') }}" target="_blank" class="btn-warning btn">Generate Laporan</a>
                </div>
            @endif
        </div>

        <table class="table" id="myTable">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Petugas</th>
                    <th>Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Nominal</th>
                    <th>SPP</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                </tr>
           </thead>
           <tbody>
          @foreach ($pembayaran as $data )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->petugas->nama_petugas }}</td>
                    <td>{{ $data->siswa->nama }}</td>
                    <td>{{ $data->tgl_bayar }}</td>
                    <td>Rp. {{ number_format($data->jumlah_bayar) }}</td>
                    <td>Rp. {{ number_format($data->spp->nominal ?? 0 )  }} - {{ $data->spp->tahun ?? '' }}</td>
                    <td>{{ $data->bulan_bayar }}</td>
                    <td>{{ $data->tahun_dibayar }}</td>
                </tr>

          @endforeach
        </tbody>

        </table>
    </div>
</div>

@endsection
