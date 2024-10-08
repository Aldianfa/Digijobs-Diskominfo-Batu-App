@extends('layout.base')
@section('title')
    Admin | Data Jabatan Pegawai
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
        <h5 class="card-header">Update Data Jabatan</h5>
        <div class="card-body">
            <form action="{{ route('jabatan.update', $jabatan->id_jabatan) }}" method="POST">
                @csrf
                @method('PUT')
                
                    <div class="form-group">
                        
                        <label for="jenis_jabatan">Jenis Jabatan</label>
                        <select class="form-control" id="jenis_jabatan" name="jenis_jabatan">
                            <option value="Struktural" {{ $jabatan->jenis_jabatan == 'Struktural' ? 'selected' : '' }}>Struktural</option>
                            <option value="Fungsional" {{ $jabatan->jenis_jabatan == 'Fungsional' ? 'selected' : '' }}>Fungsional</option>
                            {{-- <option value="Pelaksana" {{ $jabatan->jenis_jabatan == 'Pelaksana' ? 'selected' : '' }}>Pelaksana</option> --}}
                        </select>

                        <br>
                        <label for="id_sub_bagian">Sub Bagian Kepegawaian</label>
                        <select class="form-control" id="id_sub_bagian" name="id_sub_bagian">
                            @foreach ($subbagian as $item)
                            <option value="{{ $item->id_sub_bagian }}" {{ $jabatan->id_sub_bagian == $item->id_sub_bagian ? 'selected' : '' }}>{{ $item->nama_sub_bagian }}</option>
                            @endforeach
                        </select>
                        <br>

                        <label for="nama_jabatan">Nama jabatan</label>
                        <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                            value="{{ $jabatan->nama_jabatan }}" placeholder="Masukkan Nama jabatan">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection