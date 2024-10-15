@extends('layout')

@section('konten')

<div class="d-flex">
<h4>List Mahasiswa</h4>
<div class="ms-auto">
    <a class="btn btn-success" href="{{route('mahasiswa.tambah')}}">Tambah Mahasiswa</a>
</div>
</div>

<table class="table">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
    </tr>
    @foreach ($mahasiswa as $no=>$data)
    <tr>
        <td>{{$no+1}}</td>
        <td>{{$data->nim}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->prodi}}</td>
        <td>{{$data->jenis_kelamin}}</td>
        <td class="d-flex">
            <a class="btn btn-warning btn-sm me-2" href="{{route('mahasiswa.edit', $data->id)}}">Edit</a>
            <form action="{{route('mahasiswa.delete', $data->id)}}" method="post">
                @csrf
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="ms-auto">
    <a class="btn btn-primary" href="{{route('welcome')}}">Kembali</a>
</div>
@endsection