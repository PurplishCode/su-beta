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
        <h1 style="color:#1bc">Gallery Foto</h1>
    </div>
    <div class="ms-auto"><a href="{{route('gallery-foto.create')}}" class="btn btn-md btn-primary"><i class="bi bi-plus"></i> Tambahkan Foto</a></div>
   </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.view') }}">Home </a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('gallery-foto.index') }}">Gallery Foto</a>
            </li>
        </ol>
    </nav>
    
    <div class="container pt-3">
        <div class="row d-flex justify-content-evenly">
          @forelse ($listFoto as $list)
          <div class="col-md-4 p-3">
                            
            <div class="card px-3 p-3" style="width: 25rem;height:100%">
                <div class="card-img" style="height: 200px">
                    <img src=" {{ asset('assets/' . $list->lokasiFile) }} " alt="" class="img-fluid h-100">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $list->judulFoto }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Foto Description</h6>
                  <p class="card-text">{{ $list->deskripsiFoto }}</p>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href=" {{ route('gallery-foto.show', ['gallery_foto' => $list->id ]) }} " class="btn btn-md btn-primary text-start">View Details</a>
                <div class="text-end">{{ \Carbon\Carbon::parse($list->created_at)->diffForHumans() }}</div>
                    </div>
                </div>
                </div>
              </div>
        </div>
        @empty
        <div class="d-flex justify-content-center">
            <h5 class="text-muted"> Oops! There are no data yet. Try creating one?</h5>
        </div>
        @endforelse
    @endsection
</body>
</html>