@extends('layout.base')
@section('title')
    Admin | Dashboard
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12 col-6">
            <div class="card">
                <div class="card-body">
                    {!! $kegiatanchart->container() !!}
                </div>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            {{ $pengguna->count() }}
                        </h3>

                        <p class="fs-24">Pengawai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="/pegawai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>
                            {{ $klasifikasi->count() }}
                        </h3>

                        <p class="fs-24">Klasifikasi Surat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-paperclip"></i>
                    </div>
                    <a href="/klasifikasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            {{ $jabatan->count() }}
                        </h3>

                        <p>Jabatan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <a href="/jabatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{ $bidangkegiatan->count() }}
                        </h3>

                        <p>Bidang Kegiatan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <a href="/bagian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$program -> count()}}</h3>

                        <p>Program</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <a href="program" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$indikator->count()}}</h3>

                        <p>Indikator</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <a href="/subprogram" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            {{ $surat->count() }}
                        </h3>

                        <p class="fs-24">Surat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="/dasarsurat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>
                            {{ $allkegiatan->count() }}
                        </h3>

                        <p class="fs-24">Kegiatan Pegawai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-paperclip"></i>
                    </div>
                    <a href="/kegiatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    <script src="{{ $kegiatanchart->cdn() }}"></script>

    {{ $kegiatanchart->script() }}
@endsection
