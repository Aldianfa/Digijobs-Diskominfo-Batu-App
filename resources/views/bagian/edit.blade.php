@extends('layout.base')
@section('title')
    Admin | Update Bagian Kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Update Data Bagian</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/bagian" class="btn btn-primary mb-3">Kembali</a>
        <div class="card">
            <h5 class="card-header">Update Data Bagian</h5>
            <div class="card-body">
                <form action="{{ route('bagian.update', $bagian->id_bagian) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama_bagian">Nama Bagian</label>
                        <input type="text" class="form-control" id="nama_bagian" name="nama_bagian"
                            value="{{ $bagian->nama_bagian }}" placeholder="Masukkan Nama Bagian">
                        <br>
                        {{-- <label for="id_jabatan">Jabatan</label>
                        <select class="form-control" name="id_jabatan" id="id_jabatan">
                            @foreach ($jabatan as $item)
                                <option value="{{ $item->id_jabatan }}" @if ($item->id_jabatan == $bagian->id_jabatan) selected @endif>
                                    {{ $item->nama_jabatan }}</option>
                            @endforeach

                        </select> --}}
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
