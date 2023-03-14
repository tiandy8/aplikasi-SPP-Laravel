@extends('template.login')
@section('title',$title)
@section('content')


<div class="text-center mt-4">
    <h1 class="h2">Selamat Datang, Siswa</h1>
    <p class="lead">
        Masukkan NISN dan password untuk login!
    </p>
</div>

<div class="card">
    <div class="card-body">
        <div class="m-sm-4">
            <div class="text-center">
                <img src="{{ asset('img/avatars/avatar.jpg') }}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
            </div>
            @if (session('error'))
                <p class="mt-3 mb-1 text-center text-danger">{{ session('error') }}</p>
            @endif
            <form method="POST" action="{{ route('login.siswa.process') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input class="form-control form-control-lg" type="text" name="nisn" placeholder="Enter your nisn" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                </div>
                <div>
                </div>
                <div class="text-center mt-3">
                     <button class="btn form-control btn-primary">Login</button>
                </div>
            </form>
            <a href="{{ route('login.petugas') }}" class="btn mt-3 btn-warning form-control">Login Sebagai Petugas</a>
        </div>
    </div>
</div>


@endsection
