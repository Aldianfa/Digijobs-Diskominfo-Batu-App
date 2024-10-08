@extends('layout.userBase')
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
    <div class="row">
        <div class="col-6 col-sm-6 col-md-3" >
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
          </div>
    </div>
</div>
@endsection