@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Siswa</strong></h1>
            @if (Auth::user()->getLevel('admin'))

            <div class="">
                <a href="{{ route('admin.siswa.create') }}" class="btn-primary btn">+ Tambah Data</a>
            </div>
            @endif
        </div>

        <table class="table" id="myTable">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
           </thead>
          @foreach ($siswa as $data )
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nisn }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->kelas->nama_kelas ?? '-' }}</td>
                    <td>{{ $data->no_telp }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @if (Auth::user()->getLevel('admin'))

                                <a href="{{ route('admin.siswa.edit',$data->nisn) }}" class="btn-warning btn-sm btn">Edit</a>
                                <form action="{{ route('admin.siswa.delete',$data->nisn) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data?')" class="btn-danger btn-sm btn">Hapus</button>
                                </form>
                            @endif
                            <a href="{{ route('admin.laporan.siswa',$data->nisn) }}" class="btn-success btn-sm btn">History</a>

                        </div>
                    </td>
                </tr>
            </tbody>
          @endforeach
        </table>
    </div>
</div>

@endsection
