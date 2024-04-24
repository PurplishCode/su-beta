<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @extends('baseplate.layout')
    @section('content')
    
<main>
    <section class="min-vh-100 d-flex justify-content-center align-items-center mx-3">
        <div class="card" style="width:500px">
        <div class="d-flex justify-content-center mt-3"><h4 class="fw-bold lead" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Create Your Own Album!</h4></div>
            <form action="{{ route('album-foto.store') }}" class="form-group php-email-form" method="POST" id="needs-validation">
            @csrf
            <div class="px-3 pt-3">
                <label for="">Nama Album:</label>
                
                <input type="text" class="form-control" name="namaAlbum" required value="{{ old('namaAlbum') }}" id="needs-validation">
            </div>
            
            <div class="px-3 pt-3">
                <label for="">Deskripsi:</label>
                <textarea name="deskripsi" id="" cols="5" rows="2" class="form-control"></textarea>
            </div>


<div class="py-3 px-3"><button type="submit" class="btn btn-md w-100 fw-bold text-white" style="background-color: purple;">Upload</button></div>

        </form>
</div>
    
</section>
</main>
    @endsection
</body>
</html>