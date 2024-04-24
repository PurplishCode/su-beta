<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<style>
    .background-images {
	background-image: url({{ asset('assets/lading2.jpg') }}); background-repeat: no-repeat;position: relative;background-size: cover;box-shadow:0px 3px 17px  rgba(0,0,0,1);

}
</style>
<body>
    @extends('baseplate.layout')
    @section('content')
    
    <div class="pagetitle">
        <h1 style="color:#1bc">Homepage</h1>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ route('home.view') }}">Home / </a>
            </li>
            
        </ol>
    </nav>
    <main id="main" class="main main-landing mb-5">
        
        <div class="position-relative overflow-hidden p-5 p-md-5 text-white bg-light bimage background-images  shadow-sm ">
            <div class="text-content">
                <div class="p-lg-3 my-4 judul"><h1 class="display-3 fw-bold" style="z-index: 1;">SiegeU</h1>
          
       
                    <blockquote class="blackquote"><p class="lead mt-1 fw-bold" style="">Different Album Across the web!</p></blockquote></div>
                <div>   
                    {{-- <a class="btn btn-lg text-white mr-2 p-lg btn-start" href="{{ url("/login-user") }}" style="box-shadow: 12px;background-color: purple;border-radius: 15px;">Explore!</a>    --}}
                <div class="mt-3">   <div class="sub-judul fw-bold d-flex" style="color:#f8f8f8; font-family:;">"Welcome to Siege Uni.</div>
                <div class="sub-judul fw-bold mb" style="color:#f8f8f8; font-family:;">Find and explore something unique."</div>
                
                </div>
            </div>

 <figure class="text-end mt-2">
    <blockquote class="blockquote text-white" style="font-size: 15px;"><p>Knowledge is key.</p></blockquote>
    <figcaption class="blockquote-footer"><cite class="Source Title text-white">SU</cite></figcaption>
    </figure>
    <div class="product-device shadow-sm d-none d-md-block"></div>
<div class="product-device product-device-2 shadow-sm  d-none d-md-block"></div>

</div>

</div>
<div>
    <h2 class="position-relative overflow-hidden text-center mt-5 pb-5 fw-bold" style="font-family: Arial,Helvetica, sans-serif">Featured Pictures</h2>

</div>

<section class="main-course mt-5">

        <h4 class="fw-bold lead">Explore globally published pictures!</h4>
        <a href="" class="ms-auto">Discovers</a>
            
    
</section>
<div class="container pt-3 p-3">
        <div class="row">
          @forelse ($selectedAllImages as $select)
          <div class="col-md-4 p-3">
                            
            <div class="card px-3 p-3" class="" style="height: 100%;">
                <div class="card-img">
                    <img src=" {{ asset('assets/' . $select->lokasiFile) }} " alt="" class="img-fluid h-100">
                </div>
                <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center"> <h5 class="card-title">{{ $select->judulFoto }}</h5><p class="text-muted" style="font-size: 10px">Dibuat oleh {{ $select->nama }}</p></div>
                  <h6 class="card-subtitle mb-2 text-muted">Foto Description</h6>
                  <p class="card-text">{{ $select->deskripsiFoto }}</p>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href=" {{ route('gallery-foto.show', ['gallery_foto' => $select->id]) }} " class="btn btn-md btn-primary text-start">View Details</a>
                
                
                    </div>
                    <div class="pt-3">{{ \Carbon\Carbon::parse($select->created_at)->diffForHumans() }}</div>
                </div>
                </div>
              </div>
        </div>
        @empty
        <div class="d-flex justify-content-center mt-3">
            <h5 class="text-muted">Oops! We cannot find any data yet.</h5>
        </div>
        @endforelse
</div>
    @endsection
</body>
</html>
