@extends('layout.Userbase')
@section('title')
    Pejabat | Penilaian
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Penilaian Staff</h1>
    </div>
@endsection

@section('content')
    {{-- <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>
                    {{ $allkegiatan->count() }}
                </h3>

                <p>Update Riwayat Kegiatan</p>
            </div>
            <div class="icon">
                <i class="fas fa-wrench"></i>
            </div>
            <a href="/kegiatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}

    <div class="col-lg-12 col-6">
        <div class="card">
            <div class="card-body">
                {!! $kegiatanstaffchart->container() !!}
            </div>
        </div>
    </div>
    

    {{-- <div class="p-6 m-20 bg-white rounded shadow">
        {!! $kegiatanchart->container() !!}
    </div> --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Kegiatan Staff
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
                            <th>Dasar Surat</th>
                            <th>Nama Kegiatan</th>
                            <th>Inisiator</th>
                            <th>Tanggal</th>
                            {{-- <th>Indikator</th> --}}
                            <th>Keterangan</th>
                            <th>Nilai</th>
                            {{-- <th>Ditujukan Ke</th> --}}
                            <th width="11%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id_surat ? $item->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $item->surats->subklasifikasis->kode_sub_klasifikasi . '/' . $item->surats->nomor_surat . ' - ' . $item->surats->subklasifikasis->nama_sub_klasifikasi : 'Tidak Berdasarkan Surat' }}
                                </td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->inisiator }}</td>
                                <td>{{ $item->created_at }}</td>
                                {{-- <td>{{ $item->indikators->nama_indikator }}</td> --}}


                                <td>
                                    @if ($item->keterangan == 'dilanjutkan')
                                        <span class="badge badge-warning">Dilanjutkan</span>
                                    @elseif($item->keterangan == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($item->keterangan == 'belum')
                                        <span class="badge badge-danger">Belum</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->nilai == null)
                                        <span class="badge badge-danger">Belum Dinilai</span>
                                    @else
                                        @for ($i = 0; $i < $item->nilai; $i++)
                                            <i class="fas fa-star" style="color: rgb(255, 217, 0)"></i>
                                        @endfor
                                    @endif
                                </td>
                                {{-- <td>{{ $item->id ? $item->newusers->nama : 'Tidak Didispo' }}</td> --}}
                                <td>
                                    <a href="{{ route('kegiatan.show', $item->id_kegiatan) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    {{-- <a href="{{ route('kegiatan.edit', $item->id_kegiatan) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kegiatan.destroy', $item->id_kegiatan) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form> --}}
                                    <a href="{{ route('kegiatan.track', $item->id_kegiatan) }}"
                                        class="btn btn-secondary btn-sm">Tracking</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- TABEL LOG KEGIATAN --}}
        <div class="card">
            <div class="card-header">
                Kegiatan Lanjutan Staff
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
               
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dasar Surat</th>
                            <th>Dasar Kegiatan</th>
                            <th>Inisiator</th>
                            <th>Tanggal</th>
                            {{-- <th>Indikator</th> --}}
                            <th>Keterangan</th>
                            {{-- <th>Ditujukan Ke</th> --}}
                            <th>Nilai</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logkegiatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id_surat ? $item->surats->subklasifikasis->klasifikasis->kode_klasifikasi . '' . $item->surats->subklasifikasis->kode_sub_klasifikasi . '/' . $item->surats->nomor_surat . ' - ' . $item->surats->subklasifikasis->nama_sub_klasifikasi : 'Tidak Berdasarkan Surat' }}
                                </td>
                                <td>{{ $item->kegiatans->nama_kegiatan }}</td>
                                <td>{{ $item->inisiator }}</td>
                                <td>{{ $item->created_at }}</td>
                                {{-- <td>{{ $item->indikators->nama_indikator }}</td> --}}


                                <td>
                                    @if ($item->keterangan == 'dilanjutkan')
                                        <span class="badge badge-warning">Dilanjutkan</span>
                                    @elseif($item->keterangan == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($item->keterangan == 'belum')
                                        <span class="badge badge-danger">Belum</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->nilai == null)
                                        <span class="badge badge-danger">Belum Dinilai</span>
                                    @else
                                        @for ($i = 0; $i < $item->nilai; $i++)
                                            <i class="fas fa-star" style="color: rgb(255, 217, 0)"></i>
                                        @endfor
                                    @endif
                                </td>
                                {{-- <td>{{ $item->id ? $item->newusers->nama : 'Tidak Didispo' }}</td> --}}
                                <td>
                                    <a href="{{ route('logkegiatan.showlog', $item->id_log) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    {{-- <a href="{{ route('logkegiatan.edit', $item->id_log) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('logkegiatan.destroy', $item->id_log) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form> --}}
                                    <a href="{{ route('kegiatan.track', $item->id_kegiatan) }}"
                                        class="btn btn-secondary btn-sm">Tracking</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="{{ $kegiatanstaffchart->cdn() }}"></script>

    {{ $kegiatanstaffchart->script() }}
@endsection
