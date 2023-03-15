@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Petugas</strong></h1>
            <div class="">
                <a href="{{ route('admin.petugas.create') }}" class="btn-primary btn">+ Tambah Data</a>
            </div>
        </div>

        <table class="table" id="myTable">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama Petugas</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
           </thead>
           <tbody>

          @foreach ($petugas as $data )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->nama_petugas }}</td>
                    <td>{{ $data->level }}</td>

                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.petugas.edit',$data->id_petugas) }}" class="btn-warning btn-sm btn">Edit</a>
                            @if (Auth::id() == $data->id_petugas)

                            @else
                                <form action="{{ route('admin.petugas.delete',$data->id_petugas) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data?')" class="btn-danger btn-sm btn">Hapus</button>
                                </form>
                            @endif

                        </div>
                    </td>
                </tr>
          @endforeach
        </tbody>

        </table>
    </div>
</div>

@endsection
