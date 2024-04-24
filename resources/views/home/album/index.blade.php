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
    <div class="ms-auto"><a href="{{route('album-foto.create')}}" class="btn btn-md btn-primary"><i class="bi bi-plus"></i> Tambahkan Album</a></div>
   </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.view') }}">Home </a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('album-foto.index') }}">Album Foto</a>
            </li>
        </ol>
    </nav>

    <div class="container pt-3">
        <div class="row">
          @forelse ($display as $displays)
          <div class="col-md-4">
                            
            <div class="card px-3" style="width: 100%">

                <div class="card-body">
                  <h5 class="card-title">{{ $displays->namaAlbum }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Album Description</h6>
                  <p class="card-text">{{ $displays->deskripsi }}</p>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href=" {{ route('album-foto.show', ['album_foto' => $displays->id]) }} " class="btn btn-md btn-primary text-start">View Details</a>
                <div class="text-end">{{ \Carbon\Carbon::parse($displays->created_at)->diffForHumans() }}</div>
                    </div>
                </div>
                </div>
              </div>
        </div>
        @empty
        <div class="d-flex justify-content-center">
            <h5 class="text-muted">Oops! There are no data yet. Try creating one?</h5>
        </div>
          @endforelse
  
    @endsection
</body>
</html>