@extends('layout.base')
@section('title')
    Admin | Data Bidang Kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Bidang</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Detail Data</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Bagian</label>
                    <input type="text" class="form-control" name="nama" required placeholder="nama bagian" value="{{ $bagian->nama_bagian }}" readonly>
                </div>
                <a href="/bagian" class="btn btn-primary">Kembali</a>
            </div>
    </div>
@endsection