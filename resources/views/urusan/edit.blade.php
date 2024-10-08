@extends('layout.base')
@section('title')
    Admin | Edit Urusan Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Edit Urusan Kegiatan</h1>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <a href="/urusan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <h5 class="card-header">Update Data Jabatan</h5>
        <div class="card-body">
            <form action="{{ route('urusan.update', $urusan->id_urusan) }}" method="POST">
                @csrf
                @method('PUT')
                
                    <div class="form-group">
                        <label for="nama_urusan">Nama urusan</label>
                        <input type="text" class="form-control" id="nama_urusan" name="nama_urusan"
                            value="{{ $urusan->nama_urusan }}" placeholder="Masukkan Nama urusan">
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-block">Reset</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection