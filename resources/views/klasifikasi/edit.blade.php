@extends('layout.base')
@section('title')
    Admin | Update Klasifikasi Surat
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1 class="bg-danger">Update Klasifikasi Surat</h1>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <a href="/klasifikasi" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <h5 class="card-header">Update Klasifikasi Surat</h5>
        <div class="card-body">
            
            <form action="{{route('klasifikasi.update', $klasifikasi->id_klasifikasi)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kode_klasifikasi">Kode klasifikasi</label>
                    <input type="text" class="form-control" id="kode_klasifikasi" name="kode_klasifikasi"
                        placeholder="Masukkan Kode klasifikasi" value="{{ $klasifikasi->kode_klasifikasi }}">
                        <br>
                    <label for="nama_klasifikasi">Nama klasifikasi</label>
                    <input type="text" class="form-control" id="nama_klasifikasi" name="nama_klasifikasi"
                        placeholder="Masukkan Nama klasifikasi" value="{{ $klasifikasi->nama_klasifikasi }}">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
    
</div>
@endsection