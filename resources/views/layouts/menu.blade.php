<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i style="color: black" class="nav-icon fas fa-tachometer-alt"></i>
        <p style="color: black">Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('representatives.index') }}"
       class="nav-link {{ Request::is('representatives*') ? 'active' : '' }}">
       <i style="color: black" class="nav-icon fa fa-user"></i></i>
        <p style="color: black">Representatives</p>
    </a>
</li>