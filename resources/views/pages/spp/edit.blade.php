@extends('template.admin')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h1 class="h3 me-auto "><strong>Edit SPP</strong></h1>
        </div>

        <form action="{{ route('admin.spp.update',$spp->id_spp) }}" method="post">
            @csrf
            <input class="form-control mb-3" type="text" value="{{ $spp->tahun }}" name="tahun" maxlength="4" placeholder="Tahun"  required>
            <input class="form-control mb-3" type="text" value="{{ $spp->nominal }}" name="nominal" maxlength="11" placeholder="Nominal"  required>
            <button class="btn btn-primary form-control">Update</button>
        </form>

    </div>
</div>

@endsection
