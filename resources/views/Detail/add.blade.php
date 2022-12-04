@extends('peminjam.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Peminjaman</h5>

        <form method="post" action="{{route('detail.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_detail" class="form-label">ID Detail</label>
                <input type="text" class="form-control" id="id_detail" name="id_detail">
            </div>

            <div class="mb-3">
                <label for="id_film" class="form-label">Id Film</label>
                <input type="text" class="form-control" id="id_film" name="id_film">
            </div>
            <div class="mb-3">
                <label for="id_peminjam" class="form-label">Id Peminjam</label>
                <input type="text" class="form-control" id="id_peminjam" name="id_peminjam">
            </div>
            <div class="mb-3">
                <label for="id" class="form-label">Id Petugas</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop