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
        
   <div class="d-flex">
    <div class="pagetitle">
        <h1 style="color:#1bc">Album Foto</h1>
    </div>
    <div class="ms-auto"><a href="{{route('gallery-foto.create')}}" class="btn btn-md btn-primary"><i class="bi bi-plus"></i> Tambahkan Foto</a></div>
   </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.view') }}">Home </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('album-foto.index') }}">Album Foto</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('album-foto.index') }}">Data Album</a>
            </li>
        </ol>
    </nav>

    <div class="container pt-3">
        <div class="row d-flex justify-content-evenly">
          @foreach ($castedAlbums as $albums)
          <div class="col-md-4">
                            
            <div class="card px-3" style="width: 18rem%">
                <div class="card-img">
                    <img src=" {{ asset('assets/' . $albums->lokasiFile) }} " alt="" class="img-fluid h-100">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $albums->judulFoto }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Foto Description</h6>
                  <p class="card-text">{{ $albums->deskripsiFoto }}</p>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href=" {{ route('gallery-foto.show', ['gallery_foto' => $albums->id]) }} " class="btn btn-md btn-primary text-start">View Details</a>
                <div class="text-end">{{ \Carbon\Carbon::parse($albums->created_at)->diffForHumans() }}</div>
                    </div>
                </div>
                </div>
              </div>
        </div>
        @endforeach
    @endsection
</body>
</html>