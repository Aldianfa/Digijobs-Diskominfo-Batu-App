@extends('layout.userBase')
@section('title')
    USER | Kegiatan
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
        <a href="/logkegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Update Kegiatan</h5>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('logkegiatan.update', $logkegiatan->id_log) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inisiator">Nama</label>
                        <input type="text" class="form-control" name="inisiator" value="{{ $logkegiatan->inisiator }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="bidang">Bidang</label>
                        <input type="text" class="form-control" name="bidang"
                            value="{{ Auth::user()->jabatans->subbagians->bagians->nama_bagian }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="dasarkegiatan">Dasar Kegiatan</label>
                            <select name="id_kegiatan" class="form-control" readonly>
                                <option value="{{ $logkegiatan->id_kegiatan }}">{{ $logkegiatan->kegiatans->nama_kegiatan }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="idsurat">Dasar surat</label>
                            <select name="id_surat" class="form-control" readonly>
                                @foreach ($surat as $item)
                                    <option
                                        value="{{ $logkegiatan->id_surat }}"{{ $logkegiatan->id_surat == $item->id_surat ? 'selected' : '' }}>
                                        @if ($logkegiatan->surats && $logkegiatan->surats->subklasifikasis)
                                            {{ $logkegiatan->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $logkegiatan->surats->subklasifikasis->kode_sub_klasifikasi . '/' . $logkegiatan->surats->nomor_surat . ' - ' . $logkegiatan->surats->subklasifikasis->nama_sub_klasifikasi }}
                                        @else
                                            Tidak ada surat
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 mt-3">
                        <label for="id" class="form-label ">Teruskan Kegiatan Ke :</label>
                                <select class="form-control single-select-field" name="id"
                                    aria-label="Default select example">
                                    <option value="">Kerjakan Sendiri</option>
                                    @foreach ($listuser as $item)
                                        <option value="{{ $item->id ?? '-' }}"
                                            {{ $logkegiatan->id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama ?? '-' }} - {{ $item->jabatans->nama_jabatan ?? '-' }}</option>
                                    @endforeach
                                </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal">Tanggal Kegiatan</label>
                                <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan"
                                    value="{{ $logkegiatan->tanggal_kegiatan }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="{{ $logkegiatan->status }}">{{ $logkegiatan->status }}</option>
                                <option value="diterima">Diterima</option>
                                <option value="belum dibuka">Belum Dibuka</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" class="form-control">
                                <option value="{{ $logkegiatan->keterangan }}">{{ $logkegiatan->keterangan }}</option>
                                <option value="selesai">Selesai</option>
                                <option value="dilanjutkan">Dilanjutkan</option>
                                <option value="belum">Belum</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="narasi">Narasi</label>
                        <textarea name="narasi" class="form-control" value="{{ old('narasi') }}"required>{{ $logkegiatan->narasi }}</textarea>
                    </div>
                    <div class="row">
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
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="bidangkegiatan">Pejabat Penilai</label>
                        <select class="form-control single-select-field" name="id_bidang_kegiatan"
                            aria-label="Default select example">
                            <option value="">-</option>
                            @foreach ($bidangkegiatan as $item)
                                <option value="{{ $item->id_bidang_kegiatan }}"
                                    {{ $logkegiatan->id_bidang_kegiatan == $item->id_bidang_kegiatan ? 'selected' : '' }}>{{$item->newusers->nama}} - 
                                    {{ $item->nama_bidang_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Dokumentasi</label>
                        <input class="form-control" type="file" id="image" name="image" value="{{$logkegiatan->dokumentasi_1}}">
                    </div>
                    <div class="mb-3">
                        <label for="filesurat" class="form-label">File Surat/Dokumentasi 2</label>
                        <input class="form-control" type="file" id="file" name="filesurat" value="{{$logkegiatan->dokumentasi_2}}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
