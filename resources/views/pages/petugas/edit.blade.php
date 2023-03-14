@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Edit Petugas</strong></h1>
        </div>

        <form action="{{ route('admin.petugas.update',$petugas->id_petugas) }}" method="post">
            @csrf
            <input class="form-control mb-3" type="text" value="{{ $petugas->username }}" name="username" placeholder="Username"  required>
            <input class="form-control mb-3" type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" placeholder="Nama Petugas"  required>
            <select name="level" id="" class="form-control mb-3">
                <option selected disabled>- Level -</option>
                <option {{ $petugas->level == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                <option {{ $petugas->level == 'petugas' ? 'selected' : '' }} value="petugas">Petugas</option>
            </select>
            <p class="text-danger mb-2">Jika tidak ingin mengganti password, kosongkan kolom password!</p>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" >
            <button class="btn btn-primary form-control">Save</button>
        </form>

    </div>
</div>

@endsection
