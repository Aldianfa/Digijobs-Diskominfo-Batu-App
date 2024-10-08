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
                    {{-- {{ $suratmu->count() }} --}}
                    {{ $surat->count() }}
                </h3>

                <p>List Surat</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Surat</h3>
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
                    {{-- <div class="col-md-6">
                        <a href="{{ route('surat.create') }}" class="btn btn-success">Tambah Data</a>
                    </div> --}}

                </div>

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">Tanggal Masuk</th>
                            <th>Jenis Surat</th>
                            <th>Inisiator</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->surats->subklasifikasis->klasifikasis->nama_klasifikasi }} -
                                    {{ $item->surats->subklasifikasis->nama_sub_klasifikasi }} <br>
                                    {{ $item->surats->subklasifikasis->klasifikasis->kode_klasifikasi }}{{ $item->surats->subklasifikasis->kode_sub_klasifikasi }}.{{ $item->surats->nomor_surat }}
                                </td>
                                <td>{{ $item->inisiator }}</td>
                                <td>
                                    <a href="uploads/surat/{{ $item->surats->file_surat }}"
                                        class="btn btn-secondary btn-sm" target="_blank">Download</a>

                                    {{-- <a href="{{ route('kegiatan.createSurat', $item->id_surat) }}" class="btn btn-success btn-sm">Tindak
                                        Lanjut</a> --}}
                                    <a href="{{ route('logkegiatan.show', $item->id_kegiatan) }}"
                                        class="btn btn-success btn-sm">Tindak
                                        Lanjut</a>
                                    {{-- <a href="" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form> --}}


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
