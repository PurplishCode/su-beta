@include('sources.link')
@include('sources.script')

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapse" href="{{ route('home.view') }}"><i class="bi bi-grid"></i> Homepage</a>
        </li>
        @if (Auth::check())
            <li class="nav-heading">Your Menu</li>
            <li class="nav-item">
                <a class="nav-link collapse" href="{{ route('gallery-foto.index') }}"><i class="bi bi-camera"></i> Gallery Foto</a>
            </li>
            <li class="nav-item">
             <a class="nav-link collapse" href=" {{route('album-foto.index')}} "><i class="bi bi-portait"></i> Album Foto</a>
            </li>
           
            <li class="nav-heading">Others</li>
            <li class="nav-item">
                <a class="nav-link collapse" href="{{ route('about-us.view') }}"><i class="bi bi-question"></i>About us</a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapse" href="{{ route('profile.index') }}"><i class="bi bi-person"></i>Profile</a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapse" href="{{ route('logout') }}"><i class="bi bi-logout"></i> Logout</a>
            </li>
        @else
        <li class="nav-heading py-3">Guest Menu</li>
        <li class="nav-item">
            <a class="nav-link collapse" href=""><i class="bi bi-question"></i>About us</a>
        </li>
        @endif
    </ul>
</aside>