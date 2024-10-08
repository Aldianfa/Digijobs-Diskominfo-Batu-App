<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="admin" class="brand-link align-items-center px-2">
        {{-- <img src="{{ asset('img/frame.png')}}" alt="" width="200"> --}}
        <img src="{{ asset('img/goarchieveadmin.png') }}" alt="" width="190">
        {{-- <span class="brand-text font-weight-light">Sistem Informasi</span> --}}
    </a>

    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            Halo, {{ Auth::user()->nama }} 
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link {{ (request()->is('/pegawai')) ? 'active' : '' }}">
              <i class="fas fa-users"></i>
              <p>
                Data Pegawai
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/adminDasarsurat" class="nav-link">
              <i class="fas fa-envelope"></i>
              <p>Dasar Surat</p>
            </a>
          </li>    

          <li class="nav-item">
            <a href="/skpd" class="nav-link {{ (request()->is('/skpd')) ? 'active' : '' }}">
              <i class="fas fa-building"></i>
              <p>
                Data SKPD
              </p>
            </a>
          </li>
          
          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="fas fa-paperclip"></i>
              <p>
                Data Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/klasifikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Klasifikasi Surat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/subklasifikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Klasifikasi Surat</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="fas fa-graduation-cap"></i>
              <p>
                Data Kerja Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/bagian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/subbagian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Sub Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jabatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="fas fa-briefcase"></i>
              <p>
                Data Kegiatan Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/allkegiatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Kegiatan </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/bidangkegiatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pejabat Penilai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/urusan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Urusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/program" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/indikator" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Indikator</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>
