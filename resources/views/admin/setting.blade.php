@extends('layout.Base')
@section('title')
    Admin | Kegiatan
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
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>
                    {{ $jumallkegiatan}}
                </h3>

                <p>Kegiatan Pegawai</p>
            </div>
            <div class="icon">
                <i class="fas fa-wrench"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Kegiatan
            </div>
            <div class="card-body">
                @if (session()->has('kegiatansuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('kegiatansuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-success">Tambah Data</a>
                </div>

            </div> --}}
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="27%">Dasar Surat</th>
                            {{-- <th>Nama Kegiatan</th> --}}
                            <th width="13%">Tanggal</th>
                            <th width="19%">Indikator</th>
                            <th>Keterangan</th>
                            <th>Ditujukan Ke</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id_surat ? $item->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $item->surats->subklasifikasis->kode_sub_klasifikasi . '/' . $item->surats->nomor_surat . ' - ' . $item->surats->subklasifikasis->nama_sub_klasifikasi : 'Tidak Berdasarkan Surat' }}
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->indikators->nama_indikator }}</td>


                                <td>
                                    @if ($item->keterangan == 'dilanjutkan')
                                        <span class="badge badge-warning">Dilanjutkan</span>
                                    @elseif($item->keterangan == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($item->keterangan == 'belum')
                                        <span class="badge badge-danger">Belum</span>
                                    @endif
                                </td>
                                <td>{{ $item->id ? $item->newusers->nama : 'Tidak Didispo' }}</td>
                                <td>
                                    <a href="{{ route('adminkegiatan.show', $item->id_kegiatan) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('adminkegiatan.edit', $item->id_kegiatan) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('adminkegiatan.destroy', $item->id_kegiatan) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('admin.track', $item->id_kegiatan)}}" class="btn btn-secondary btn-sm">Tracking</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Kegiatan Lanjutan
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-success">Tambah Data</a>
                </div>

            </div> --}}
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dasar Surat</th>
                            {{-- <th>Nama Kegiatan</th> --}}
                            <th>Tanggal</th>
                            <th>Indikator</th>
                            <th>Keterangan</th>
                            <th>Ditujukan Ke</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logkegiatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id_surat ? $item->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $item->surats->subklasifikasis->kode_sub_klasifikasi . '/' . $item->surats->nomor_surat . ' - ' . $item->surats->subklasifikasis->nama_sub_klasifikasi : 'Tidak Berdasarkan Surat' }}
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->indikators->nama_indikator }}</td>


                                <td>
                                    @if ($item->keterangan == 'dilanjutkan')
                                        <span class="badge badge-warning">Dilanjutkan</span>
                                    @elseif($item->keterangan == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($item->keterangan == 'belum')
                                        <span class="badge badge-danger">Belum</span>
                                    @endif
                                </td>
                                <td>{{ $item->id ? $item->newusers->nama : 'Tidak Didispo' }}</td>
                                <td>
                                    <a href="{{ route('adminlog.show', $item->id_log) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('adminlog.edit', $item->id_log) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('adminlog.destroy', $item->id_log) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    {{-- <a href="{{ route('kegiatan.track', $item->id_kegiatan)}}" class="btn btn-secondary btn-sm">Tracking</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
