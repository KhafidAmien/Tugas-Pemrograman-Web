@extends('layouts.main')

@section('header')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-2">
                            <h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
                            <a href="{{route('mahasiswa.tambah')}}" class="btn btn-success">Tambah Mahasiswa</a>
                    </div>
@endsection

@section('content')
<div class="card shadow w-100 mx-3" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Mahasiswa</h6>
                        </div>
                        <div class="card-body" style="max-width: 1400px;">
                            <div class="table-responsive">
                            <table class="table ">
                                
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                                
                                
                                @if ($mahasiswa->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center pt-5"><span class="">-- Tidak ada data --</span></td>
                                    </tr>
                                @else
                                @foreach ($mahasiswa as $no=>$data)
                                <tr>
                                    <td class="align-middle">{{$no+1}}</td>
                                    <td class="align-middle">{{$data->nim}}</td>
                                    <td class="align-middle">{{$data->nama}}</td>
                                    <td class="align-middle">{{$data->prodi}}</td>
                                    <td class="align-middle">{{$data->jenis_kelamin}}</td>
                                    <td class="align-middle">
                                        @if ($data->photo)
                                            <img src="{{ asset('storage/' . $data->photo) }}" alt="Foto {{ $data->nama }}" 
                                            class="img-thumbnail rounded-circle" style="width: 60px; height: 60px; object-fit:cover; ">
                                        @else
                                            <span class="align-middle">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-row ">
                                        <a class="btn btn-warning btn-sm mr-3" href="{{route('mahasiswa.edit', $data->id)}}">Edit</a>
                                        <form action="{{route('mahasiswa.delete', $data->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                            </div>
                        </div>
                    </div>

@endsection

