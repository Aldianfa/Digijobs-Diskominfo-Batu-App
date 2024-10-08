@extends('layout.base')
@section('title')
    Admin | Data Indikator Kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Tambah Data Indikator Kerja</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/indikator" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Tambah Indikator Kerja</h5>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Pilih Program</label>
                                <select class="form-control single-select-field" name="id_program" id="id_program">
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id_program }}">{{$item->urusans->nama_urusan}} - 
                                            {{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-md-12 mt-4">
                                <label for="nama_indikator">Nama Indikator</label>
                                <textarea type="text" class="form-control" id="nama_indikator" name="nama_indikator"
                                    placeholder="Masukkan Nama Indikator"></textarea>
                                {{-- <input type="text" class="form-control" id="nama_indikator" name="nama_indikator"
                                    placeholder="Masukkan Nama Indikator"> --}}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.single-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endsection
