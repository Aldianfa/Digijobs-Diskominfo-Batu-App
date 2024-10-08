@extends('layout.base')
@section('title')
    Admin | Update Bidang Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Update Bidang Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/bidangkegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Update Bidang Kegiatan</h5>
            <div class="card-body">
                <form action="{{route('bidangkegiatan.update', $bidangkegiatan->id_bidang_kegiatan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-grup">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Penilai</label>
                                <select class="form-control single-select-field" name="id" id="id">
                                    <option value="">Pilih Penilai</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}" {{$item->id == $bidangkegiatan->id ? 'selected' : ''}}>{{ $item->nama }} - {{$item->jabatans->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama_bidang_kegiatan"> Bidang Kegiatan</label>
                                <input type="text" class="form-control" id="nama_bidang_kegiatan" name="nama_bidang_kegiatan"
                                    placeholder="Masukkan Nama Bidang Kegiatan" value="{{$bidangkegiatan->nama_bidang_kegiatan}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                        <button type="reset" class="btn btn-danger mt-3">Reset</button>
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
