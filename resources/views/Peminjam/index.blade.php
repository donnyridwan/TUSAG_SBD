@extends('peminjam.layout')
@section('content')
<h4 class="mt-5">Data Peminjam</h4>
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
<a href="{{ route('peminjam.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('peminjam.restore') }}" type="button" class="btn btn-warning rounded-3">Restore Data</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Action</th>
            <th>Soft Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->id_peminjam }}</td>
            <td>{{ $data->nama_peminjam }}</td>
            <td>{{ $data->alamat_peminjam }}</td>
            <td>
                <a href="{{ route('peminjam.edit',$data->id_peminjam) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAHBARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_peminjam }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_peminjam }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('peminjam.delete', $data->id_peminjam) }}">
                        @csrf
                        <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </td>
            <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $data->id_peminjam }}">
                Soft Delete
            </button>

                    <!-- Modal -->
                    <div class="modal fade" id="softhapusModal{{ $data->id_peminjam }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('peminjam.softDelete', $data->id_peminjam) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $data->nama_peminjam}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop