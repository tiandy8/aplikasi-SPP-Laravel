@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Tambah Petugas</strong></h1>
        </div>

        <form action="{{ route('admin.petugas.store') }}" method="post">
            @csrf
            <input class="form-control mb-3" type="text" name="username" placeholder="Username"  required>
            <input class="form-control mb-3" type="text" name="nama_petugas" placeholder="Nama Petugas"  required>
            <select name="level" id="" class="form-control mb-3">
                <option selected disabled>- Level -</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
            <input type="password" name="password" required placeholder="Password" class="form-control mb-3">
            <button class="btn btn-primary form-control">Save</button>
        </form>

    </div>
</div>

@endsection
