@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Edit Kelas</strong></h1>
        </div>

        <form action="{{ route('admin.kelas.update',$kelas->id_kelas) }}" method="post">
            @csrf
            <input class="form-control mb-3" value="{{ $kelas->nama_kelas }}" type="text" name="nama_kelas" placeholder="Nama Kelas"  required>
            <input class="form-control mb-3" value="{{ $kelas->kompetensi_keahlian }}" type="text" name="kompetensi_keahlian" placeholder="Kompetensi Keahlian"  required>
            <button class="btn btn-primary form-control">Update</button>
        </form>

    </div>
</div>

@endsection
