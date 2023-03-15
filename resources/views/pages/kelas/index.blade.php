@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Kelas</strong></h1>
            <div class="">
                <a href="{{ route('admin.kelas.create') }}" class="btn-primary btn">+ Tambah Data</a>
            </div>
        </div>

        <table class="table" id="myTable">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th>Aksi</th>
                </tr>
           </thead>
           <tbody>
          @foreach ($kelas as $data )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td>{{ $data->kompetensi_keahlian }}</td>

                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.kelas.edit',$data->id_kelas) }}" class="btn-warning btn-sm btn">Edit</a>
                            <form action="{{ route('admin.kelas.delete',$data->id_kelas) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus data?')" class="btn-danger btn-sm btn">Hapus</button>
                            </form>

                        </div>
                    </td>
                </tr>
          @endforeach
        </tbody>
        </table>
    </div>
</div>

@endsection
