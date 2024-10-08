@extends('layout.base')
@section('title')
    Admin | Data Sub Klasifikasi Surat
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Tambah Data Sub Klasifikasi Surat</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/subklasifikasi" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Tambah Sub Klasifikasi Surat</h5>
            <div class="card-body">
                <form action="{{route('subklasifikasi.store')}}" method="POST">
                    @csrf
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Kode Klasifikasi</label>
                                <select class="form-control" name="id_klasifikasi" id="id_klasifikasi">
                                    @foreach ($klasifikasi as $item)
                                        <option value="{{ $item->id_klasifikasi }}">{{ $item->kode_klasifikasi }}-{{ $item->nama_klasifikasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="kode_sub_klasifikasi">Kode Sub Klasifikasi</label>
                                <input type="text" class="form-control" id="kode_sub_klasifikasi" name="kode_sub_klasifikasi"
                                    placeholder="Masukkan Kode Klasifikasi">
                            </div>
                            <div class="col-md-6">
                                <label for="nama_sub_klasifikasi">Nama Sub Klasifikasi</label>
                                <input type="text" class="form-control" id="nama_sub_klasifikasi" name="nama_sub_klasifikasi"
                                    placeholder="Masukkan Nama Klasifikasi">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
