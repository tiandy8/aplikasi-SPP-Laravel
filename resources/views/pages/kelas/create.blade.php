@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Tambah Kelas</strong></h1>
        </div>

        <form action="{{ route('admin.kelas.store') }}" method="post">
            @csrf
            <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas"  required>
            <input class="form-control mb-3" type="text" name="kompetensi_keahlian" placeholder="Kompetensi Keahlian"  required>
            <button class="btn btn-primary form-control">Save</button>
        </form>

    </div>
</div>

@endsection
