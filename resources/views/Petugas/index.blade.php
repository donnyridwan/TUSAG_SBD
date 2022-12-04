@extends('petugas.layout')
@section('content')
<h4 class="mt-5">Data Petugas</h4>
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
            <th>Id Petugas</th>
            <th>Nama Petugas</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->id}}</td>
            <td>{{ $data->name}}</td>
            <td>{{ $data->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop