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
        <h5 class="card-title fw-bolder mb-3">Tambah Peminjam</h5>

        <form method="post" action="{{route('peminjam.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_peminjam" class="form-label">ID Peminjam</label>
                <input type="text" class="form-control" id="id_peminjam" name="id_peminjam">
            </div>

            <div class="mb-3">
                <label for="nama_peminjam" class="form-label">Nama peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
            </div>
            <div class="mb-3">
                <label for="alamat_peminjam" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_peminjam" name="alamat_peminjam">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop