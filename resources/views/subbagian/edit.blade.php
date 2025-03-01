@extends('layout.base')
@section('title')
    Admin | Update Sub Bagian Kepegawaian
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Update Sub Bagian Kepegawaian</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/subbagian" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Update Data Sub Bagian Kepegawaian</h5>
            <div class="card-body">
                <form action="{{ route('subbagian.update', $subbagian->id_sub_bagian) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Bagian</label>
                                <select class="form-control" name="id_bagian" id="id_bagian">
                                    @foreach ($bagian as $item)
                                        <option value="{{ $item->id_bagian}}" {{$item->id_bagian == $subbagian->id_bagian ? 'selected' : ''}}>{{ $item->nama_bagian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_sub_bagian">Nama Sub_Bagian</label>
                                <input type="text" class="form-control" id="nama_sub_bagian" name="nama_sub_bagian"
                                    placeholder="Masukkan Nama sub_bagian" value="{{$subbagian->nama_sub_bagian}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                        <button type="reset" class="btn btn-danger mt-3">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
