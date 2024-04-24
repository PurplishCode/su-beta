<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    @extends('baseplate.layout')
    @section('content')
    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="profile-card text-center">
                <img src="{{ $auth->gambar_profile ? asset('assets/' . $auth->gambar_profile) : asset('assets/profile.jpg') }}" alt="Profile Picture" class="profile-picture">
                <div class="profile-info">
                    <h2>{{ $auth->nama }}</h2>
                    <p>Full Name: {{ $auth->namaLengkap }}</p>
                    <p>Email: {{ $auth->email }}</p>
                    <p>Address: {{ $auth->alamat }}</p>
                    <p>Phone Number: {{ $auth->nomor_telepon }}</p>
                    <a href="{{ route('profile.update', ['profile' => $auth->id]) }}" class="btn btn-primary btn-md w-100">UPDATE PROFILE</a>
                </div>
            </div>
        </div>
    </section>
    @endsection
</body>
</html>