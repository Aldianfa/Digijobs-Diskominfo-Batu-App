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
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    {{ $suratkeluar->count() }}
                </h3>

                <p>Surat Keluar</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Surat Keluarmu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('surat.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">Tanggal Keluar</th>
                            <th>Jenis Surat</th>
                            {{-- <th>Ditujukan ke</th> --}}
                            <th>Perihal</th>
                            {{-- <th>Status Surat</th> --}}
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratkeluar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->subklasifikasis->klasifikasis->nama_klasifikasi }} -
                                    {{ $item->subklasifikasis->nama_sub_klasifikasi }} <br>
                                    {{ $item->subklasifikasis->klasifikasis->kode_klasifikasi }}{{ $item->subklasifikasis->kode_sub_klasifikasi }}.{{ $item->nomor_surat }}
                                </td>
                                <td>{{ $item->perihal }}</td>
                                {{-- <td>
                                    @if ($item->status_surat == 'Selesai')
                                        <span class="badge bg-success">{{ $item->status_surat }}</span>
                                    @elseif($item->status_surat == 'On Progress')
                                        <span class="badge bg-warning">{{ $item->status_surat }}</span>
                                    @endif
                                </td>  --}}
                                {{-- <td>{{ $item->newusers->nama }}</td> --}}

                                
                                <td>
                                    {{-- <a href="{{ asset('public/uploads/surat/' . $item->file_surat) }}"
                                        class="btn btn-secondary btn-sm" target="_blank">Download</a> --}}

                                    <a href="{{ route('kegiatan.createSurat', $item->id_surat) }}"
                                        class="btn btn-success btn-sm">Tindak
                                        Lanjut</a>

                                    <a href="uploads/surat/{{ $item->file_surat }}" class="btn btn-secondary btn-sm"
                                        target="_blank">Download</a>

                                    {{-- <a href="{{ route('kegiatan.createSurat', $item->id_surat) }}" class="btn btn-success btn-sm">Tindak
                                        Lanjut</a> --}}

                                    <a href="{{ route('surat.edit', $item->id_surat) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('surat.destroy', $item->id_surat) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
