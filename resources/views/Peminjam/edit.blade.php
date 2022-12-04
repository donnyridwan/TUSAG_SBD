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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Peminjam</h5>
        <form method="post" action="{{route('peminjam.update', $data->id_peminjam) }}">
            @csrf
            <div class="mb-3">
                <label for="id_peminjam" class="form-label">ID peminjam</label>
                <input type="text" class="form-control" id="id_peminjam" name="id_peminjam" value="{{ $data->id_peminjam}}">
            </div>
            <div class="mb-3">
                <label for="nama_peminjam" class="form-label">Nama peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ $data->nama_peminjam }}">
            </div>
            <div class="mb-3">
                <label for="alamat_peminjam" class="form-label">Alamat peminjam</label>
                <input type="text" class="form-control" id="alamat_peminjam" name="alamat_peminjam" value="{{ $data->alamat_peminjam }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop