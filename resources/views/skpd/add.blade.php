@extends('layout.base')
@section('title')
    Admin | Tambah SKPD Kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data SKPD</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/skpd" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Tambah SKPD Kerja</h5>
            <div class="card-body">
                <form action="{{ route('skpd.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_skpd">Nama SKPD</label>
                        <input type="text" class="form-control" id="nama_skpd" name="nama_skpd"
                            placeholder="Masukkan Nama SKPD">
                        <br>
                        {{-- <label for="id_jabatan">Jabatan</label>
                        <select class="form-control" name="id_jabatan" id="id_jabatan">
                            @foreach ($jabatan as $item)
                                <option value="{{$item->id_jabatan}}">{{$item->nama_jabatan}}</option>
                            @endforeach

                        </select> --}}
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
