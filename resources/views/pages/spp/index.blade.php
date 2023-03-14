@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>SPP</strong></h1>
            <div class="">
                <a href="{{ route('admin.spp.create') }}" class="btn-primary btn">+ Tambah Data</a>
            </div>
        </div>

        <table class="table">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
           </thead>
          @foreach ($spp as $data )
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->tahun }}</td>
                    <td>Rp. {{ number_format($data->nominal) }}</td>

                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.spp.edit',$data->id_spp) }}" class="btn-warning btn-sm btn">Edit</a>
                            <form action="{{ route('admin.spp.delete',$data->id_spp) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus data?')" class="btn-danger btn-sm btn">Hapus</button>
                            </form>

                        </div>
                    </td>
                </tr>
            </tbody>
          @endforeach
        </table>
    </div>
</div>

@endsection
