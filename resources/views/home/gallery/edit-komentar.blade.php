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
    <form action="{{ route('edit.komentar', ['komentar_foto' => $komentarFoto->id]) }}" method="POST" class="form-control">
        @csrf @method('PUT') 
        <div class="d-flex justify-content-center align-items-center">
            <h5 class="lead text-muted">Edit Komentar</h5>
        </div>
        <div class="py-3">
        <label for="">Komentar: </label><input type="text" name="isiKomentar" class="form-control"></div>
    <button type="submit" class="btn btn-md btn-primary">EDIT KOMENTAR</button>
    </form>
    @endsection
</body>
</html>