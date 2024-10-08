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
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    {{ $allkegiatanmasuk->count() }}
                </h3>

                <p>Kegiatan Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-business-time"></i>
            </div>
            <a href="/logkegiatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Kegiatan Masuk
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    {{-- <div class="col-md-6">
                        <a href="{{ route('log.create') }}" class="btn btn-success">Tambah Data</a>
                    </div> --}}

                </div>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dari</th>
                            <th>Dasar Surat</th>
                            {{-- <th>Nama Kegiatan</th> --}}
                            <th>Tanggal Dikirim</th>
                            <th>narasi</th>
                            <th>Keterangan</th>
                            <th width="25%">Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allkegiatanmasuk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->inisiator}}</td>
                                <td>{{ $item->id_surat ? $item->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $item->surats->subklasifikasis->kode_sub_klasifikasi . '/'.$item->surats->nomor_surat . ' - ' . $item->surats->subklasifikasis->nama_sub_klasifikasi  : 'Tidak Berdasarkan Surat' }}</td>
                                {{-- <td>{{ $item->nama_kegiatan }}</td> --}}
                                <td>{{ $item->created_at}}</td>
                                {{-- <td>{{ $item->indikators->nama_indikator }}</td> --}}
                                <td>{{$item->narasi}}</td>
                                
                                <td>
                                    @if ($item->keterangan == 'dilanjutkan')
                                        <span class="badge badge-warning">Dilanjutkan</span>
                                    @elseif($item->keterangan == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($item->keterangan == 'belum')
                                        <span class="badge badge-danger">Belum</span>
                                    @endif

                                    {{-- @if ($item->jenis_kegiatan == 'Kerjakan Sendiri')
                                        <span class="badge badge-primary">Kerjakan Sendiri</span>
                                    @elseif($item->jenis_kegiatan == 'Diserahkan Kepada Orang Lain')
                                        <span class="badge badge-secondary">Diserahkan Kepada Orang Lain</span>
                                    @endif --}}
                                </td>
                                <td>
                                    <a href="{{ route('logkegiatan.show', $item->id_kegiatan) }}" class="btn btn-success btn-sm">Tindak Lanjut</a>
                                    <a href="{{ route('kegiatan.track', $item->id_kegiatan)}}" class="btn btn-secondary btn-sm">Tracking</a>
                                    {{-- <a href="" class="btn btn-danger" data-toggle="modal" data-target="#TrackModal">Tracking</a> --}}
                                    {{-- <a href="{{ route('log.edit', $item->id_kegiatan) }}" class="btn btn-warning">Edit</a> --}}
                                    {{-- <form action="{{ route('kegiatan.destroy', $item->id_kegiatan) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="TrackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="PenyelesaianModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PenyelesaianModalLabel">Tracking Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <h5 class="card-header">Log Kegiatan</h5>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Inisiator</th>
                                        <th>Narasi</th>
                                        <th>Dokumentasi</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($track as $log) 
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $log->created_at }}</td>
                                            <td>{{ $log->inisiator }}</td>
                                            <td>{{$log->narasi}}</td>
                                            <td>
                                                <img src="{{ asset('uploads/image/' . $kegiatan->dokumentasi_1) }}" alt="" width="500px">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>Diskominfo 2023</center>
                </div>
            </div>
        </div>
    </div> --}}

@endsection