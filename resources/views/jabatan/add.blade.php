@extends('layout.base')
@section('title')
    Admin | Add Jabatan Pegawai
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Jabatan</h1>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <a href="/jabatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <h5 class="card-header">Tambah Jabatan Pegawai</h5>
        <div class="card-body">
            <form action="{{ route('jabatan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis_jabatan">Jenis Jabatan</label>
                    <select class="form-control" id="jenis_jabatan" name="jenis_jabatan">
                        <option value="Struktural">Struktural</option>
                        <option value="Fungsional">Fungsional</option>
                    </select>
                    <br>
                    <label for="id_sub_bagian">Sub Bagian Kepegawaian</label>
                    <select class="form-control" id="id_sub_bagian" name="id_sub_bagian">
                        @foreach ($subbagian as $item)
                        <option value="{{ $item->id_sub_bagian }}">{{ $item->nama_sub_bagian }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="nama_jabatan">Nama jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                        placeholder="Masukkan Nama jabatan">
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection