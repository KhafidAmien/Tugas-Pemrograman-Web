<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>

    <h1 class="text-center mt-3">Selamat datang di belajar laravel amien, saya membuat CRUD sederhana dengan laravel.</h1>
    <div class="container">
        <div class="row ">
        <div class="col justify-content-start">
        <a href="{{route('mahasiswa.tampil')}}" class="text-center btn btn-primary">Lihat List Mahasiswa</a>
        </div>
        </div>
    </div>
</body>
</html>