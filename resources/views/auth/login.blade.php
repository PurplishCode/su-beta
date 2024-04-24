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
        <div class="card" style="width:500px">
        <div class="d-flex justify-content-center mt-3"><h4 class="fw-bold lead" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Sign in Your Account!</h4></div>
    <div class="d-flex justify-content-center mt-1"><blockquote class="" style="font-size: 2">Revel in its eccentric vibes of gallery!</blockquote></div>    
            <form action="{{ route('login.post') }}" class="form-group php-email-form" method="POST" id="needs-validation">
            @csrf
            <div class="px-3">
                <label for="">Email:</label>
                
                <input type="text" class="form-control" name="email" required value="{{ old('email') }}" id="needs-validation">
            </div>
            
            <div class="px-3 pt-3">
                <label for="">Password:</label>
                
                <input type="password" class="form-control" name="password" required id="needs-validation">
            </div>

<div class="py-3 px-3"><button type="submit" class="btn btn-md w-100 fw-bold btn-primary">SIGN IN</button></div>
<div class="pt-3 px-3 mx-3 py-3" style="border-top:1px solid black;">Don't have any account yet? <a href="{{ route('register.view') }}">Sign up!</a> </div>
        </form>
</div>
    
</section>
</main>
</body>
</html>