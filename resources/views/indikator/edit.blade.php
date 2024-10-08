@extends('layout.base')
@section('title')
    Admin | Data Indikator Kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Update Indikator Kerja</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/indikator" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Update Indikator Kerja</h5>
            <div class="card-body">
                <form action="{{ route('indikator.update', $indikator->id_indikator) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Program</label>
                                <select class="form-control" name="id_program" id="id_program">
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id_program }}"
                                            @if ($item->id_program == $indikator->id_program) selected @endif>
                                            {{ $item->urusans->nama_urusan }} -
                                            {{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <br>
                            <div class="col-md-12 mt-4">
                                <label for="nama_indikator">Nama Indikator</label>
                                <textarea type="text" class="form-control" id="nama_indikator" name="nama_indikator"
                                    placeholder="Masukkan Nama Indikator">{{$indikator->nama_indikator}}</textarea>
                                {{-- <input type="text" class="form-control" id="nama_indikator" name="nama_indikator"
                                    placeholder="Masukkan Nama Sub Program"> --}}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
