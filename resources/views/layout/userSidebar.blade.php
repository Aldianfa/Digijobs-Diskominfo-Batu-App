<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{route('userdashboard')}}" class="brand-link align-items-center px-2">
        <img src="{{ asset('img/goarchieve.png') }}" alt="" width="190">
        {{-- <span class="brand-text font-weight-light">Sistem Informasi</span> --}}
    </a>

    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    Halo, {{ Auth::user()->nama }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-paperclip"></i>
                        <p>
                            Data Kegiatan
                            <i class="fas fa-briefcase"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/InputDasarKegiatan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Klasifikasi Surat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="/dasarsurat" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Surat Masuk</p>
                          </a>
                      </li>
                    </ul>
                </li> --}}
                <li class="nav-header">SURAT</li>
                <li class="nav-item">
                    <a href="/dasarsurat/tambah" class="nav-link">
                        <i class="fas fa-envelope-open-text"></i>
                        <p>
                            Input Dasar Surat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dasarsurat" class="nav-link ">
                        <i class="fas fa-envelope"></i>
                        <p>
                            Surat Keluar
                        </p>
                    </a>
                </li>
                
                {{-- <li class="nav-item">
                    <a href="/suratmasuk" class="nav-link ">
                        <i class="fas fa-envelope-open"></i>
                        <p>
                            Surat Masuk
                        </p>
                    </a>
                </li> --}}
                <li class="nav-header">KEGIATAN</li>
                <li class="nav-item">
                    <a href="/kegiatan" class="nav-link ">
                        <i class="fas fa-briefcase"></i>
                        <p>
                            Dasar Kegiatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suratmasuk" class="nav-link">
                        <i class="fas fa-envelope-open"></i>
                        <p>
                            Kegiatan Bersurat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logkegiatan" class="nav-link">
                        <i class="fas fa-business-time"></i>
                        <p>
                            Kegiatan Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/updatekegiatan" class="nav-link">
                        <i class="fas fa-wrench"></i>
                        <p>
                            Update Kegiatan
                        </p>
                    </a>
                </li>

                {{-- //just can show if user level is pejabat --}}
                @if (Auth::user()->level == 'pejabat')
                <li class="nav-header">PENILAIAN</li>
                <li class="nav-item">
                    <a href="/penilaian" class="nav-link">
                        <i class="fas fa-star"></i>
                        <p>
                            Penilaian Kinerja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/penilaianstaff" class="nav-link active">
                        <i class="fas fa-user-tag"></i>
                        <p>
                            Controlling Staff
                        </p>
                    </a>
                </li>
                @endif

                {{-- <li class="nav-item">
                    <a href="/coba" class="nav-link ">
                        <i class="fas fa-users"></i>
                        <p>
                            Test
                        </p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item menu">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-paperclip"></i>
                        <p>
                            Pekerjaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/kegiatan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dasar Pekerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logkegiatan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Melanjutkan Pekerjaan</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
