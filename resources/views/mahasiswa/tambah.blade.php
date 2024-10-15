@extends('layout')

@section('konten')

<h4>Tambah Mahasiswa</h4>

<form action="{{route('mahasiswa.submit')}}" method="post">
    @csrf
    <label>NIM</label>
    <input type="number" name="nim" class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2">
    <label>Prodi</label>
    <input type="text" name="prodi" class="form-control mb-2">
    <label>Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" class="form-control mb-2">

    <div class="d-flex">
        <div class="me-2">
            <button class="btn btn-primary">Tambah</button>
        </div>
        <div>
            <a class="btn btn-warning" href="{{route('mahasiswa.tampil')}}">Kembali</a>
        </div>
    </div>
</form>
@endsection