@extends('layout.userBase')
@section('title')
    USER | Dashboard
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>
            Dashboard
            {{-- <small>Control panel</small> --}}
        </h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/kegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Input Kegiatan</h5>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inisiator" class="form-label">Inisiator</label>
                        <input type="text" class="form-control" name="inisiator" value="{{ Auth::user()->nama }}"
                            readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control"
                                    value="{{ Auth::user()->jabatans->nama_jabatan }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Bidang Penilai</label>
                                    <input type="text" name="bidang" class="form-control" value="{{ Auth::user()->jabatans->subbagians->bagians->nama_bagian }}" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_surat" class="form-label">Dasar Surat Kegiatan</label>
                        <select class="form-control" name="id_surat" aria-label="Default select example">
                            <option value="">KEGIATAN SEHARI-HARI</option>
                            @foreach ($surat as $item)
                                <option value="{{ $item->id_surat }}">
                                    {{ $item->subklasifikasis->klasifikasis->kode_klasifikasi }}{{ $item->subklasifikasis->kode_sub_klasifikasi }}
                                    -- {{ $item->subklasifikasis->nama_sub_klasifikasi }} - {{ $item->perihal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                    name="nama_kegiatan" required placeholder="nama kegiatan"
                                    value="{{ old('nama_kegiatan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" required placeholder="tanggal" value="{{ old('tanggal') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                        <select name="jenis_kegiatan" class="form-control">
                            <option value="Kerjakan Sendiri">Kerjakan Sendiri</option>
                            <option value="Diserahkan Kepada Orang Lain">Diserahkan Kepada Orang Lain</option>
                        </select>
                        </div>
                        <div class="col-md-8">
                            <label for="id" class="form-label ">Teruskan Kegiatan Ke :</label>
                        <select class="form-control single-select-field" name="id"
                            aria-label="Default select example">
                            <option value="">-</option>
                            @foreach ($newusers as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} -
                                    {{ $item->jabatans->nama_jabatan }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="narasi" class="form-label">Narasi</label>
                                <textarea name="narasi" class="form-control" value="{{ old('narasi') }}"required></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <select name="keterangan" class="form-control">
                                    <option value="belum">Belum</option>
                                    <option value="dilanjutkan">Dilanjutkan</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <label for="urusan" class="form-label">Urusan</label>
                            <select name="urusan" id="urusan" class="form-control" aria-placeholder="Pilih Urusan">
                                <option value="">Pilih Urusan</option>
                                <option value="1">Utama</option>
                                <option value="2">Manajerial</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="program" class="form-label">Program</label>
                            <select name="program.dropdown" id="program" class="form-control"
                                aria-placeholder="Pilih Program">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="indikator" class="form-label">Indikator</label>
                            <select name="id_indikator" id="indikator" class="form-control"
                                aria-placeholder="Pilih Indikator">
                            </select>
                        </div>
                    </div> --}}
                    <div class="mb-3 mt-3">
                        <label for="indikator" class="form-label">Indikator</label>
                            <select name="id_indikator" class="form-control single-select-field"
                                aria-placeholder="">
                                <option value="">-</option>
                                @foreach ($indikator as $item)
                                    <option value="{{ $item->id_indikator }}">{{ $item->nama_indikator }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="bidangkegiatan">Pejabat Penilai</label>
                        <select class="form-control single-select-field" name="id_bidang_kegiatan"
                            aria-label="Default select example">
                            <option value="">-</option>
                            @foreach ($bidangkegiatan as $item)
                                <option value="{{ $item->id_bidang_kegiatan }}">{{ $item->newusers->nama }} - {{ $item->subbagians->nama_sub_bagian }}</option>
                            @endforeach
                        </select>

                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="image" class="form-label">Dokumentasi</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="filesurat" class="form-label">File Surat</label>
                        <input class="form-control" type="file" id="file" name="filesurat">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="image" class="form-label">Dokumen 2</label>
                        <input class="form-control" type="image" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Dokumen 2</label>
                        <input class="form-control" type="image" id="image" name="image">
                    </div> --}}

                    <br>
                    <div class="row">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-block">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        //on document ready jquery
        $(document).ready(function() {
            // send ajax request to get the program of the selected urusan and append to the select tag       
            function onChangeProgramSelect(url, id_urusan, nama_urusan) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_urusan: id_urusan
                    },
                    success: function(data) {
                        // $('#program').empty();
                        // $('#program').append('<option>Pilih Program</option>');
                        // $.each(data, function (key, value) {
                        //     $('#program').append('<option value="' + key + '">' + value + '</option>');
                        // });

                        let select = $('#program');
                        select.empty();
                        select.attr('placeholder', 'Pilih Program');
                        select.append('<option value="">Pilih Program</option>');
                        $.each(data, function(key, value) {
                            select.append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }

            function onChangeIndikatorSelect(url, id_program, nama_program) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_program: id_program
                    },
                    success: function(data) {
                        $('#indikator').empty();
                        $('#indikator').append('<option>Pilih Indikator Kegiatan</option>');

                        $.each(data, function(key, value) {
                            $('#indikator').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            }

            $('#program').attr('disabled', true);
            $('#indikator').attr('disabled', true);

            $(function() {
                $('#urusan').change(function() {
                    var id_urusan = $(this).val();
                    var url = "{{ URL::to('program-dropdown') }}";
                    var nama_urusan = "nama_program";
                    $('#program').attr('disabled', false).empty();
                    $('#indikator').attr('disabled', true).empty();
                    onChangeProgramSelect(url, id_urusan, nama_urusan);

                });
            });

            $(function() {
                $('#program').change(function() {
                    var id_program = $(this).val();
                    var url = "{{ URL::to('indikator-dropdown') }}";
                    var nama_program = "nama_indikator";

                    $('#indikator').attr('disabled', false);
                    onChangeIndikatorSelect(url, id_program, nama_program);

                });
            });



        });
    </script>
    <script>
        $('.single-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endsection