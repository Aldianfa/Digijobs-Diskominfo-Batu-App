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
        <div class="row">
            <div class="col-md-8">
                <a href="/logkegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-4">
                {{-- @if (Auth::user()->level == 'pejabat')
                    <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#PenilaianModal"><i
                            class="fas fa-star"></i> Nilai</a>
                @endif  --}}
                <a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#PenyelesaianModal"><i
                        class="fas fa-check"></i> Penyelesaian</a>
                <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#PenyelesaianModal"><i
                        class="fas fa-share"></i> Disposisi</a>

            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Dasar Kegiatan</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="inisiator" class="form-label">Inisiator</label>
                    <input type="text" class="form-control" name="inisiator" value="{{ $kegiatan->inisiator }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="id_surat" class="form-label">Dasar Surat Kegiatan</label>
                    <input type="text" class="form-control" name="id_surat"
                        value="{{ $kegiatan->surats->perihal ?? 'Tidak ada surat' }}" readonly>

                    {{-- <input type="text" class="form-control" name="id_surat" value="{{$kegiatan->surats->perihal}}" readonly> --}}
                    {{-- <input type="text" class="form-control" name="id_surat" value="{{$kegiatan->id_surat}}" readonly> --}}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan"
                                value="{{ $kegiatan->nama_kegiatan }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ $kegiatan->tanggal }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>

                            <input type="text" class="form-control" name="jenis_kegiatan"
                                value="{{ $kegiatan->jenis_kegiatan }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id" class="form-label">Tujuan Dispo</label>
                            <input type="text" class="form-control" name="id"
                                value="{{ $kegiatan->newusers->nama ?? 'Tidak ada tujuan' }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="indikator" class="form-label">Indikator</label>
                            <input type="text" class="form-control" name="id_indikator"
                                value="{{ $kegiatan->indikators->nama_indikator }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bidangkegiatan">Pejabat Penilai</label>
                            <input type="text" class="form-control" name="bidangkegiatan"
                                value="{{ $kegiatan->bidangkegiatans->newusers->nama }}" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="narasi" class="form-label">narasi</label>
                            <textarea name="narasi" class="form-control" value="{{ $kegiatan->narasi }}"readonly>{{ $kegiatan->narasi }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>

                            @if ($kegiatan->keterangan == 'belum')
                                <span class="badge bg-danger">Belum</span>
                            @elseif($kegiatan->keterangan == 'dilanjutkan')
                                <span class="badge bg-warning">Dilanjutkan</span>
                            @elseif($kegiatan->keterangan == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </div>
                    </div>

                </div>
                {{-- //preview file image from database --}}
                <div class="mb-3">
                    <label for="file" class="form-label">Dokumentasi</label>
                    <br>
                    <img src="{{ asset('uploads/image/' . $kegiatan->dokumentasi_1) }}" alt="" width="500px">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                        <a href="../../uploads/surat/{{ $kegiatan->dokumentasi_2 }}" class="btn btn-secondary btn-block"
                            target="_blank"><i class="fas fa-file"></i> Download Surat</a>
                </div>
                <br>
            </div>
        </div>
        
    </div>

    {{-- Modal Penyelesaian --}}
    <div class="modal fade" id="PenyelesaianModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="PenyelesaianModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PenyelesaianModalLabel">Tindak Lanjut</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('logkegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inisiator">Nama</label>
                            <input type="text" class="form-control" name="inisiator"
                                value="{{ Auth::user()->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="bidang">Bidang</label>
                            <input type="text" class="form-control" name="bidang" value="{{Auth::user()->jabatans->subbagians->bagians->nama_bagian}}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="dasarkegiatan">Dasar Kegiatan</label>
                            {{-- <input type="text" class="form-control" name="id_kegiatan"
                                value="{{ $kegiatan->id_kegiatan }}" readonly> --}}
                                <select name="id_kegiatan" class="form-control" readonly>
                                    <option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="idsurat">Dasar surat</label>
                                <select name="id_surat" class="form-control" readonly>
                                    {{-- // if id_surat is null then show 'Tidak ada surat' else show the surat  --}}
                                    {{-- <option value="{{ $kegiatan->id_surat }}">{{ $kegiatan->surats->subklasifikasis->klasifikasis->kode_klasifikasi ?? 'Tidak ada surat' }}</option> --}}

                                    {{-- <option value="{{ $kegiatan->id_surat }}">{{ $kegiatan->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $kegiatan->surats->subklasifikasis->kode_sub_klasifikasi . '/'.$kegiatan->surats->nomor_surat . ' - ' . $kegiatan->surats->subklasifikasis->nama_sub_klasifikasi ?? 'Tidak ada surat'}}</option> --}}
                                    <option value="{{ $kegiatan->id_surat }}">
                                        @if ($kegiatan->surats && $kegiatan->surats->subklasifikasis)
                                            {{ $kegiatan->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $kegiatan->surats->subklasifikasis->kode_sub_klasifikasi . '/'.$kegiatan->surats->nomor_surat . ' - ' . $kegiatan->surats->subklasifikasis->nama_sub_klasifikasi }}
                                        @else
                                            Tidak ada surat
                                        @endif
                                    </option>
                                    
                                </select>
                                {{-- <input type="text" class="form-control" name="id_surat" value="{{$kegiatan->id_surat}}" readonly> --}}
                            </div>
                        </div>
                        <br>
                        {{-- <div class="mb-3">
                            <label for="nama_log_kegiatan">Nama Kegiatan</label>
                            <input type="text" name="nama_log_kegiatan">
                        </div> --}}
                        <div class="mb-3">
                            <label for="id">Teruskan Kegiatan Ke :</label>
                            <select class="form-control single-select-field" name="id" aria-label="Default select example">
                                <option value="" selected>Kerjakan Sendiri</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} - {{$item->jabatans->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal">Tanggal Kegiatan</label>
                                    <input type="date" class="form-control" name="tanggal_kegiatan"
                                        id="tanggal_kegiatan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" >
                                    <option value="diterima">Diterima</option>
                                    <option value="belum dibuka">Belum Dibuka</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="keterangan">Keterangan</label>
                                <select name="keterangan" class="form-control" >
                                    <option value="selesai">Selesai</option>
                                    <option value="dilanjutkan">Dilanjutkan</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="narasi">Narasi</label>
                            <textarea name="narasi" class="form-control"></textarea>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <label for="urusan" class="form-label">Urusan</label>
                                <select name="urusan" id="urusan" class="form-control"
                                    aria-placeholder="Pilih Urusan">
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
                        <br>
                        <div class="mb-3">
                            <label for="bidangkegiatan">Pejabat Penilai</label>
                            <select class="form-control single-select-field" name="id_bidang_kegiatan"
                                aria-label="Default select example">
                                <option value="">-</option>
                                @foreach ($bidangkegiatan as $item)
                                    <option value="{{ $item->id_bidang_kegiatan }}">{{$item->newusers->nama}} - {{ $item->subbagians->nama_sub_bagian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Dokumentasi</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="filesurat" class="form-label">File Surat/Dokumentasi 2</label>
                            <input class="form-control" type="file" id="file" name="filesurat">
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="id_kegiatan">Kegiatan</label>
                                    <input type="text" class="form-control" name="id_kegiatan"
                                        value="{{ $kegiatan->nama_kegiatan }}" readonly>
                                </div>
                            </div>
                        </div> --}}
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
                <div class="modal-footer">
                    <center>Diskominfo 2023</center>
                </div>
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
