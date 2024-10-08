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
        {{-- <a href="/kegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a> --}}
        <div class="row">
            <div class="col-md-11">
                <a href="/kegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-1">
                <a href="" class="btn btn-warning mb-3" data-toggle="modal" data-target="#PenilaianModal"><i
                        class="fas fa-star"></i> Nilai</a>


            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Detail Kegiatan</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="inisiator" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="inisiator" value="{{ $kegiatan->inisiator }}" readonly>
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
                                <input type="text" name="bidang" class="form-control" value="{{ $kegiatan->bidang }}" readonly>
                        </div>
                    </div>
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
                            <label for="id" class="form-label">Teruskan Kegiatan Ke :</label>
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
                                value="{{ $kegiatan->bidangkegiatans->newusers->nama }} - {{ $kegiatan->bidangkegiatans->nama_bidang_kegiatan }}"
                                readonly>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="narasi" class="form-label">Narasi</label>
                    <textarea name="narasi" class="form-control" value="{{ $kegiatan->narasi }}"readonly>{{ $kegiatan->narasi }}</textarea>
                </div>
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
        <div class="card">
            <h5 class="card-header">Penilaian Kegiatan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nilai" class="form-label">Nilai</label>
                        <br>
                        @if ($kegiatan->nilai == null)
                            <span class="badge badge-danger">Belum Dinilai</span>
                        @else
                            @for ($i = 0; $i < $kegiatan->nilai; $i++)
                                <i class="fas fa-star" style="color: rgb(255, 217, 0); font-size: 24px;"></i>
                            @endfor
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="catatannilai">Catatan Penilai</label>
                        <textarea name="catatan_nilai" id="catatan_nilai" class="form-control"
                            readonly>{{ $kegiatan->catatan_nilai }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Penilaian --}}
    <div class="modal fade" id="PenilaianModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="PenilaianModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PenilaianModalLabel">Penilaian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penilaiankegiatan.update', $kegiatan->id_kegiatan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="nilailabel">Berikan Nilai</label>
                                    <select name="nilai" id="nilai" class="form-control">
                                        <option value="">Pilih Nilai</option>
                                        <option value="1">1 - Sangat Buruk</option>
                                        <option value="2">2 - Buruk</option>
                                        <option value="3">3 - Cukup</option>
                                        <option value="4">4 - Baik</option>
                                        <option value="5">5 - Sangat Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="catatannilai">Catatan</label>
                                    <textarea name="catatan_nilai" id="catatan_nilai" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <center>Diskominfo 2023</center>
                </div>
            </div>
        </div>
    </div>
@endsection
