<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    @include('sources.link')
@include('sources.script')

</head>
<body>
@include('sweetalert::alert')
<main>
    <section class="min-vh-100 d-flex justify-content-center align-items-center mx-3">
        <div class="card" style="width:1000px">
        <div class="d-flex justify-content-center mt-3"><h4 class="fw-bold lead" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Sign up New Account!</h4></div>
    <div class="d-flex justify-content-center mt-1"><blockquote class="" style="font-size: 2">Trascends into the plethora of image.</blockquote></div>    
            <form action="{{ route('register.post') }}" class="form-group php-email-form" method="POST" id="needs-validation">
            @csrf
<div class="container">
      <div class="row my-3">
        <div class="col-md-6"> <div class="px-3 mt-2">
            <label for="">Name:</label>
            
            <input type="text" class="form-control" name="nama" required value="{{ old('nama') }}" id="needs-validation" placeholder="Your name..">
        </div>
</div>
        <div class="col-md-6"> <div class="px-3 mt-3">
            <label for="">Email:</label>
            
            <input type="text" class="form-control" name="email" required value="{{ old('email') }}" id="needs-validation" placeholder="Your Email: Example@gmail.com">
        </div>
</div>
<div class="col-md-6">
    <div class="px-3 mt-3">
        <label for="">Password:</label>
        
        <input type="text" class="form-control" name="password" required value="{{ old('email') }}" id="needs-validation" placeholder="Your Password..">
    </div>
</div>
<div class="col-md-6">
    <div class="px-3 mt-3">
        <label for="">Full Name:</label>
        
        <input type="text" class="form-control" name="namaLengkap" required value="{{ old('fullName') }}" id="needs-validation" placeholder="Your complete name..">
    </div>
</div>
<div class="col-md-6">
    <div class="px-3 mt-3">
        <label for="">Nomor Telepon:</label>
        
        <input type="text" class="form-control" name="nomorTelepon" required value="{{ old('nomorTelepon') }}" id="needs-validation" placeholder="Your phone number..">
    </div>
</div>
<div class="col-md-12">
    <div class="px-3 mt-3">
        <label for="">Address:</label>
        
        <textarea name="alamat" id="" cols="5" rows="2" class="form-control" placeholder="Your address.. Example Street 65"></textarea>
    </div>
</div>

    </div>
</div>
          
<div class="py-3 px-3"><button type="submit" class="btn btn-md w-100 fw-bold btn-primary">SIGN UP</button></div>
<div class="pt-3 px-3 mx-3 py-3" style="border-top:1px solid black;">Already have an account? <a href=" {{ route('login') }} ">Sign in!</a> </div>
        </form>
</div>
    
</section>
</main>
</body>
</html>