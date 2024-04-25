@include('sources.link')
@include('sources.script')

<header class="header d-flex align-items-center" id="header">
<div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo d-flex justify-content-center">
        <img src="{{ asset('logo.PNG')}}" alt="">
        <span class="d-lg-block d-none px-3">SiegeUni</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div>
@if (Auth::check())
    <div class="header-nav ms-auto d-flex align-items-center justify-content-center">
        <h5 class="fw-bold me-3 my-3" style="font-size: 18px">{{ auth()->user()->nama }}</h5>
    </div>
        @else
    <div class="header-nav ms-auto">
        <a href="{{ route('register.view') }}" class="btn btn-primary btn-md me-3">Register</a>
        
        <a href="{{ route('login') }}" class="btn btn-primary btn-md me-3">Login</a>
        
    </div>
@endif
</header>
<div style="padding-top:60px;"></div>