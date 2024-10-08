@extends('layout.base')
@section('title')
    Admin | Tambah Bidang Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Tambah Bidang Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/bidangkegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Tambah Bidang Kegiatan</h5>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Penilai</label>
                                <select class="form-control single-select-field" name="id" id="id">
                                    <option value="">Pilih Penilai</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{$item->nama}} - {{ $item->jabatans->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_bidang_kegiatan"> Bidang Kegiatan</label>
                                {{-- <input type="text" class="form-control" id="nama_sub_bagian" name="nama_bidang_kegiatan"
                                    placeholder="Masukkan Nama Bidang Kegiatan"> --}}
                                    <select name="id_sub_bagian" id="" class="form-control">
                                        <option value="">Pilih Bidang</option>
                                        @foreach ($subbagians as $item)
                                            <option value="{{ $item->id_sub_bagian }}">{{ $item->nama_sub_bagian }}</option>
                                        @endforeach
                                    </select>
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
