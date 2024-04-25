<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>@extends('baseplate.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $selectedFoto->judulFoto }}</h1>
                @can('edit-foto', $selectedFoto->id)
                <a href="{{ route('gallery-foto.edit', ['gallery_foto' => $selectedFoto->id]) }}" class="btn btn-primary">Edit Foto</a>
                @endcan
            </div>
            <div class="pt-3">
                <div class="img-fluid">
                    <img src="{{ asset('assets/' . $selectedFoto->lokasiFile) }}" alt="Foto" class="img-fluid rounded border">
                </div>
            </div>
            <div class="pt-4">
                <div class="card p-3">
                    <h4 class="lead text-muted fw-bold">Deskripsi Foto</h4>
                    <p class="blockquote">{{ $selectedFoto->deskripsiFoto }}</p>
                </div>
            </div>
            <form action="{{ route('post.like', ['like_foto' => $selectedFoto->id]) }}" method="POST" class="pt-3">
                @csrf
                <div class="d-flex mx-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-thumbs-up me-1"></i> Like</button>
                    <div class="px-3 bg-success text-center d-flex justify-content-center align-items-center text-white rounded" style="width: 25px; height: 30px;">{{ $amountOfLikes }}</div>
                </div>
            </form>
            <div class="pt-3">
                <h5 class="text-muted">Komentar Foto</h5>
                <form action="{{ route('post.komentar', ['komentar_foto' => $selectedFoto->id]) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="isiKomentar" id="isiKomentar" class="form-control" placeholder="Isi Komentar Unik mu disini!!">
                        <button type="submit" class="btn btn-primary">Tambahkan Komentar</button>
                    </div>
                </form>
            </div>
            <div class="pt-3">
                <div class="card">
                    <div class="card-header">Comments</div>
                    <div class="card-body">
                        @forelse ($isiKomentar as $komentar)
                        <div class="media mb-4">
                            <div class="media-body">
                                <p>Posted By: {{ $komentar->users ? $komentar->users->nama : 'Anonymous' }}</p>
                                <p>{{ $komentar->isiKomentar }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{ $komentar->created_at }}</small>
                                    <div class="btn-group">
                                        @can('edit-komentar', $komentar->id)
                                        <a href="{{ route('komentar.view', ['komentar_foto' => $komentar->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        @endcan
                                        @can('hapus-komentar', $komentar->id)
                                        <form action="{{ route('hapus.komentar', ['komentar_foto' => $komentar->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center">
                            <p class="text-muted pt-3">Be the first to comment!</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>