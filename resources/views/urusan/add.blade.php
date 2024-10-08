@extends('layout.base')
@section('title')
    Admin | Data Urusan Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Urusan Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/urusan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Tambah Urusan Pegawai</h5>
            <div class="card-body">
                <form action="{{ route('urusan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_urusan">Nama urusan</label>
                        <input type="text" class="form-control" id="nama_urusan" name="nama_urusan"
                            placeholder="Masukkan Nama urusan">
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
