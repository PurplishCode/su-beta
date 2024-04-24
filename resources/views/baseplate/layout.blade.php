<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('sources.link')
    @include('sources.script')

    <style>
        .content {
            padding-top: 60px; 
        }
    </style>

</head>
<body> 
 @include('sweetalert::alert')
    @include('baseplate.navbar')
    @include('baseplate.sidebar')

    <div class="p-3 content">
        @yield('content')
    </div>
       
</body>
</html>