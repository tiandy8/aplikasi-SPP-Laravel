@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Edit Siswa</strong></h1>
        </div>

        <form action="{{ route('admin.siswa.update',$siswa->nisn) }}" method="post">
            @csrf
            <input class="form-control mb-3" value="{{ $siswa->nisn }}" type="number" name="nisn" placeholder="NISN"  required>
            <input class="form-control mb-3" value="{{ $siswa->nis }}" type="number" name="nis" placeholder="NIS"  required>
            <input class="form-control mb-3" value="{{ $siswa->nama }}" type="text" name="nama" placeholder="Nama Siswa"  required>
            <input class="form-control mb-3" value="{{ $siswa->no_telp }}" type="number" name="no_telp" placeholder="Nomor Telepon"  required>
            <select name="id_kelas" class="form-control mb-3">
                <option selected disabled>- Kelas -</option>
                @foreach ($kelas as $data )
                    <option {{ $siswa->id_kelas == $data->id_kelas ? 'selected' : '' }} value="{{ $data->id_kelas }}">{{ $data->nama_kelas }}</option>
                @endforeach
            </select>
            <textarea name="alamat" rows="5" class="form-control mb-2" placeholder="Alamat">{{ $siswa->alamat }}</textarea>
            <p class="text-danger mb-2">Jika tidak ingin mengganti password, kosongkan kolom password!</p>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" >
            <button class="btn btn-primary form-control">Update</button>
        </form>

    </div>
</div>

@endsection
