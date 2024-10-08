@extends('layout.base')
@section('title')
    Admin | Data Sub Program Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Update Sub Program Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/subprogram" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Update Sub Program Kegiatan</h5>
            <div class="card-body">
                <form action="{{ route('subprogram.update', $subprogram->id_sub_program) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Program</label>
                                <select class="form-control" name="id_program" id="id_program">
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id_program }}"
                                            @if ($item->id_program == $subprogram->id_program) selected @endif>
                                            {{ $item->kode_program }} -
                                            {{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kode_sub_program">Kode Sub Program</label>
                                <input type="text" class="form-control" id="kode_sub_program" name="kode_sub_program"
                                    placeholder="P.xx.x.x.x" value="{{$subprogram->kode_sub_program}}">
                            </div>
                            <br>
                            <div class="col-md-12 mt-4">
                                <label for="nama_program">Nama Sub Program</label>
                                <textarea type="text" class="form-control" id="nama_sub_program" name="nama_sub_program"
                                    placeholder="Masukkan Nama Sub Program">{{$subprogram->nama_sub_program}}</textarea>
                                {{-- <input type="text" class="form-control" id="nama_sub_program" name="nama_sub_program"
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
