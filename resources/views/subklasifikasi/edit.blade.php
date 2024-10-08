@extends('layout.base')
@section('title')
    Admin | Update Sub Klasifikasi Surat
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
            <h5 class="card-header">Update Sub Klasifikasi Surat</h5>
            <div class="card-body">
                <form action="{{ route('subklasifikasi.update', $subklasifikasi->id_sub_klasifikasi) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Kode Klasifikasi</label>
                                <select class="form-control" name="id_klasifikasi" id="id_klasifikasi">
                                    @foreach ($klasifikasi as $item)
                                        <option value="{{ $item->id_klasifikasi }}"
                                            {{ $item->id_klasifikasi == $subklasifikasi->id_klasifikasi ? 'selected' : '' }}>
                                            {{ $item->kode_klasifikasi }}-{{ $item->nama_klasifikasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="kode_sub_klasifikasi">Kode Sub Klasifikasi</label>
                                <input type="text" class="form-control" id="kode_sub_klasifikasi"
                                    name="kode_sub_klasifikasi" placeholder="Masukkan Kode Klasifikasi"
                                    value="{{ $subklasifikasi->kode_sub_klasifikasi }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nama_sub_klasifikasi">Nama Sub Klasifikasi</label>
                                <input type="text" class="form-control" id="nama_sub_klasifikasi"
                                    name="nama_sub_klasifikasi" placeholder="Masukkan Nama Klasifikasi"
                                    value="{{ $subklasifikasi->nama_sub_klasifikasi }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
