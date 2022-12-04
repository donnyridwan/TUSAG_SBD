@extends('nota.layout')
@section('content')
<h4 class="mt-5">Status Peminjaman</h4>
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('nota.index') }}">Status</a></li>
        <li><a class="dropdown-item" href="{{ route('detail.index') }}">Detail</a></li>
        <li><a class="dropdown-item" href="{{ route('peminjam.index') }}">Peminjam</a></li>
        <li><a class="dropdown-item" href="{{ route('film.index') }}">Film</a></li>
        <li><a class="dropdown-item" href="{{ route('petugas.index') }}">Petugas</a></li>
    </ul>
    @if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th>Id Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>judul_film</th>
            <th>nama petugas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->id_detail}}</td>
            <td>{{ $data->nama_peminjam}}</td>
            <td>{{ $data->judul_film}}</td>
            <td>{{ $data->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop