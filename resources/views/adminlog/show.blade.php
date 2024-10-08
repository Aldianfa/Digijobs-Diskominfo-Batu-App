@extends('layout.Base')
@section('title')
    Admin | Detail Kegiatan
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
    <a href="/allkegiatan" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <h5 class="card-header">Detail Log Kegiatan</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="inisiator" class="form-label">Inisiator</label>
                <input type="text" class="form-control" name="inisiator" value="{{ $logkegiatan->inisiator }}" readonly>
            </div>
            <div class="mb-3">
                <label for="id_surat" class="form-label">Dasar Surat Kegiatan</label>
                <input type="text" class="form-control" name="id_surat"
                    value="{{ $logkegiatan->surats->perihal ?? 'Tidak ada surat' }}" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan"
                            value="{{ $logkegiatan->kegiatans->nama_kegiatan }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" value="{{ $logkegiatan->tanggal_kegiatan }}"
                            readonly>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="id" class="form-label">Teruskan Kegiatan Ke :</label>
                <input type="text" class="form-control" name="id"
                    value="{{ $logkegiatan->newusers->nama ?? 'Tidak ada tujuan' }}" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="indikator" class="form-label">Indikator</label>
                        <input type="text" class="form-control" name="id_indikator"
                            value="{{ $logkegiatan->indikators->nama_indikator }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="bidangkegiatan">Pejabat Penilai</label>
                        <input type="text" class="form-control" name="bidangkegiatan"
                            value="{{ $logkegiatan->bidangkegiatans->newusers->nama }} - {{ $logkegiatan->bidangkegiatans->nama_bidang_kegiatan }}" readonly>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="narasi" class="form-label">Narasi</label>
                <textarea name="narasi" class="form-control" value="{{ $logkegiatan->narasi }}"readonly>{{ $logkegiatan->narasi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>

                @if ($logkegiatan->keterangan == 'belum')
                    <span class="badge bg-danger">Belum</span>
                @elseif($logkegiatan->keterangan == 'dilanjutkan')
                    <span class="badge bg-warning">Dilanjutkan</span>
                @elseif($logkegiatan->keterangan == 'selesai')
                    <span class="badge bg-success">Selesai</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Dokumentasi</label>
                    <br>
                    <img src="{{ asset('uploads/image/' . $logkegiatan->dokumentasi_1) }}" alt="" width="500px">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                    <a href="../../uploads/surat/{{ $logkegiatan->dokumentasi_2 }}" class="btn btn-secondary btn-block"
                        target="_blank"><i class="fas fa-file"></i> Download Surat</a>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection