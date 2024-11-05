@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-2">
        <h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
    </div>
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="card shadow w-100 mx-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mahasiswa</h6>
    </div>
    <div class="card-body" style="max-width: 1400px;">
        <form action="{{ route('mahasiswa.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="number" class="form-control" name="nim" id="nim" max="999999999999" required>
                    <div id="nim-alert" class="alert alert-warning mt-2" style="display: none;">
                        NIM tidak boleh lebih dari 12 karakter.
                    </div>
                    @error('nim')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" maxlength="100" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" name="prodi" id="prodi" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="photo" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                    <small class="text-muted">jpeg, png, jpg</small>
                </div>
                <div class="col-md-6">
                    <!-- Elemen gambar untuk pratinjau -->
                    <img id="showImage" src="" alt="Preview Foto" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                </div>
            </div>
            <div class="d-flex mt-5">
                <button type="submit" class="btn btn-success mr-3">Simpan</button>
                <a class="btn btn-primary" href="{{ route('mahasiswa.tampil') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>

<!-- Script Foto -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#photo').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

<!-- Alert Batasan inputan NIM -->
<script>
    document.getElementById('nim').addEventListener('input', function() {
        const nimInput = this.value;
        const alertElement = document.getElementById('nim-alert');

        if (nimInput.length > 12) {
            alertElement.style.display = 'block';
        } else {
            alertElement.style.display = 'none';
        }
    });
</script>
@endsection
