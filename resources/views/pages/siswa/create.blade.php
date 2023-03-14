@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Tambah Siswa</strong></h1>
        </div>

        <form action="{{ route('admin.siswa.store') }}" method="post">
            @csrf
            <input class="form-control mb-3" type="number" name="nisn" placeholder="NISN"  required>
            <input class="form-control mb-3" type="number" name="nis" placeholder="NIS"  required>
            <input class="form-control mb-3" type="text" name="nama" placeholder="Nama Siswa"  required>
            <input class="form-control mb-3" type="number" name="no_telp" placeholder="Nomor Telepon"  required>
            <select name="id_kelas" class="form-control mb-3">
                <option selected disabled>- Kelas -</option>
                @foreach ($kelas as $data )
                    <option value="{{ $data->id_kelas }}">{{ $data->nama_kelas }}</option>
                @endforeach
            </select>
            <textarea name="alamat" rows="5" class="form-control mb-3" placeholder="Alamat"></textarea>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password"  required>
            <button class="btn btn-primary form-control">Save</button>
        </form>

    </div>
</div>

@endsection
