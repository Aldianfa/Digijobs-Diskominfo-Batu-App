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
            <h5 class="card-header">Tracking Surat</h5>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">Disposisi Ke</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Narasi</th>
                            <th>Indikator</th>
                            <th>Bukti</th>
                            <th>Dokumen</th>
                            <th>status</th>
                            <th>Keterangan</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ((object) $logkegiatan as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td>{{ $log->inisiator }}</td>
                                <td>{{ $log->narasi }}</td>
                                <td>{{$log->indikators->nama_indikator}}</td>
                                <td>
                                    <img src="{{ asset('uploads/image/' . $log->dokumentasi_1) }}" alt="" width="100px">
                                    <a href="../../uploads/image/{{ $log->dokumentasi_1 }}" target="_blank">Lihat</a>
                                </td>
                                <td>
                                    {{-- <img src="{{ asset('uploads/image/' . $log->dokumentasi_1) }}" alt="" width="100px"> --}}
                                    @if ($log->dokumentasi_2 == null)
                                        <span class="badge badge-danger">Tidak ada</span>
                                    @elseif ($log->dokumentasi_2 != null)
                                        {{-- <img src="{{ asset('uploads/surat/' . $log->dokumentasi_2) }}" alt="" width="100px"> --}}
                                        <a href="../../uploads/surat/{{ $log->dokumentasi_2 }}" target="_blank">Lihat</a>
                                    @endif

                                    
                                </td>
                                <td>
                                    @if ($log->status == 'diterima')
                                        <span class="badge badge-success">Diterima</span>
                                    @elseif($log->status == 'belum dibuka')
                                        <span class="badge badge-danger">Belum dibuka</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($log->keterangan == 'dilanjutkan')
                                        <span class="badge badge-warning">Dilanjutkan</span>
                                    @elseif($log->keterangan == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($log->keterangan == 'belum')
                                        <span class="badge badge-danger">Belum</span>
                                    @endif

                                </td>
                                {{-- <td>
                                <img src="{{ asset('uploads/image/' . $logkegiatan->dokumentasi_1) }}" alt="" width="500px">
                            </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
