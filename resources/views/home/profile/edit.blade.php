<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .profile-info p {
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }
        .profile-info button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @extends('baseplate.layout')
    @section('content')
    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="profile-card text-center">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <img src="{{ $profile->gambar_profile ? asset('assets/' . $profile->gambar_profile) : asset('assets/profile.jpg') }}" alt="Profile Picture" class="profile-picture">

                        <div class="form-group mt-4">
                            <form action="{{ route('profile.update', ['profile' => $profile->id])}}" method="POST" enctype="multipart/form-data">
                         
                            <label for="gambar_profile" class="py-4">Ganti Foto Profil</label>
                            <input type="file" class="form-control-file form-control" id="gambar_profile" name="gambar_profile">
                        </div>
                    </div>
                    <div class="col-md-6">
                            @csrf
                            @method('PUT')
                            <div class="form-group py-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $profile->nama }}">
                            </div>
                            <div class="form-group py-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $profile->email }}">
                            </div>
                            <div class="form-group py-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $profile->alamat }}">
                            </div>
                            <div class="form-group py-3">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" name="nomor_telepon" value="{{ $profile->nomor_telepon }}">
                            </div>
                            <input type="text" class="form-control" name="password" value="{{ $profile->password }}" hidden>
                            <input type="text" class="form-control" name="namaLengkap" value="{{ $profile->namaLengkap }}" hidden>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

</body>
</html>
