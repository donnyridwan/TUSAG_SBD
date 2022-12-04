@extends('film.layout')
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
        <h5 class="card-title fw-bolder mb-3">Ubah Data film</h5>
        <form method="post" action="{{route('film.update', $data->id_film) }}">
            @csrf
            <div class="mb-3">
                <label for="id_film" class="form-label">ID Film</label>
                <input type="text" class="form-control" id="id_film" name="id_film" value="{{ $data->id_film}}">
            </div>
            <div class="mb-3">
                <label for="judul_film" class="form-label">judul film</label>
                <input type="text" class="form-control" id="judul_film" name="judul_film" value="{{$data->judul_film}}">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">tahun_terbit</label>   
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{$data->tahun_terbit}}">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{$data->genre}}">
            </div>
            <div class="mb-3">
                <label for="produser" class="form-label">produser</label>
                <input type="text" class="form-control" id="produser" name="produser" value="{{$data->produser}}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop