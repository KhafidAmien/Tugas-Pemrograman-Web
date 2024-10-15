@extends('layout')

@section('konten')

<h4>Edit Mahasiswa</h4>

<form action="{{route('mahasiswa.update', $mahasiswa->id)}}" method="post">
    @csrf
    <label>NIM</label>
    <input type="number" name="nim" value="{{$mahasiswa->nim}}" class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" value="{{$mahasiswa->nama}}" class="form-control mb-2">
    <label>Prodi</label>
    <input type="text" name="prodi" value="{{$mahasiswa->prodi}}" class="form-control mb-2">
    <label>Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" value="{{$mahasiswa->jenis_kelamin}}" class="form-control mb-2">

    
    <div class="d-flex">
        <div class="me-2">
            <button class="btn btn-primary">Edit</button>
        </div>
        <div>
            <a class="btn btn-warning" href="{{route('mahasiswa.tampil')}}">Kembali</a>
        </div>
    </div>
</form>
@endsection