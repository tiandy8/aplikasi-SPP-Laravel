@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Tambah Laporan</strong></h1>
        </div>

        <form action="{{ route('admin.laporan.store') }}" method="post">
            @csrf
            <select name="nisn" required id="" class="form-control mb-3">
                <option selected disabled>- Siswa -</option>
                @foreach ($siswa as $data )
                    <option value="{{ $data->nisn }}">{{ $data->nama }}</option>
                @endforeach
            </select>
            <input type="text" maxlength="11" name="jumlah_bayar" class="form-control mb-3" placeholder="Nominal bayar" required>

            <select class="form-control mb-3" name="bulan_bayar" >
                <option selected disabled>- Bulan Bayar - </option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
            <input type="text" maxlength="4" name="tahun_dibayar" class="form-control mb-3" placeholder="Tahun bayar" required>
            <input class="form-control mb-3" type="date" name="tgl_bayar" placeholder="Tanggal Bayar"  required>
            <select name="id_spp" required class="form-control mb-3">
                <option selected disabled>- SPP -</option>
                @foreach ($spp as $data )
                    <option value="{{ $data->id_spp }}">Rp. {{ number_format($data->nominal) }} - {{ $data->tahun }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary form-control">Save</button>
        </form>

    </div>
</div>

@endsection
