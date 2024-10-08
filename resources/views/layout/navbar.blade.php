<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            {{-- <button class="btn btn-warning fs-8 m-2" type="submit" onclick="return confirm('Yakin Anda Logout?')">LogOut</button> --}}
            <form id="logout-form" action="/logout" method="POST" style="display: none;" >
                @csrf
                {{-- <button class="btn btn-warning fs-8 m-2" type="submit" onclick="return confirm('Yakin Anda Logout?')">LogOut</button> --}}
            </form>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

