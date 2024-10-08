@extends('layout.userBase')
@section('title')
    USER | DASHBOARD
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>User Dashboard</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <style>
                .banner-image {
                    width: 1280px;
                    height: 300px;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    border-radius: 20px;
                }
            </style>
            <a href="kegiatan">
                <img src="../img/baner1.png" class="banner-image" alt="Banner">
            </a>


            {{-- <img src="../img/baner1.png" width="1280" height="300"> --}}
            {{-- <a href="/kegiatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}

        </div>
        <br>
        {{-- <div class="col-6 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                        10
                        <small>%</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div> --}}
    </div>
@endsection
