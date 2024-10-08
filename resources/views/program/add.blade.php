@extends('layout.base')
@section('title')
    Admin | Data Program Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Tambah Data Program Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/program" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Tambah Program Kegiatan</h5>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Kepentingan</label>
                                <select class="form-control" name="id_urusan" id="id_urusan">
                                    @foreach ($urusan as $item)
                                        <option value="{{ $item->id_urusan }}">{{ $item->nama_urusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-4">
                                <label for="kode_program">Kode Program</label>
                                <input type="text" class="form-control" id="kode_program" name="kode_program"
                                    placeholder="Masukkan Kode Program">
                            </div> --}}
                            <div class="col-md-6">
                                <label for="nama_program">Nama Program</label>
                                <input type="text" class="form-control" id="nama_program" name="nama_program"
                                    placeholder="Masukkan Nama Program">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
