@extends('layout.Base')
@section('title')
    Admin | Surat Masuk
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
                    {{ $surat->count() }}
                </h3>

                <p>Surat Kegiatan</p>
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
                <h3 class="card-title">Data Surat Kegiatan</h3>
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
                        <a href="{{ route('adminSurat.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
    
                </div>
    
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">Tanggal</th>
                            <th>Klasifikasi Surat</th>
                            <th>Inisiator</th>
                            <th>Perihal</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                {{-- <td>{{ $item->sub_klasifikasis->kode_sub_klasifikasi }}{{ $item->sub_klasifikasis->klasifikasis->kode_klasifikasi }}</td> --}}
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->subklasifikasis->klasifikasis->kode_klasifikasi }}{{ $item->subklasifikasis->kode_sub_klasifikasi }}.{{$item->nomor_surat}} <br> {{ $item->subklasifikasis->klasifikasis->nama_klasifikasi }} - {{ $item->subklasifikasis->nama_sub_klasifikasi }}</td>
                                <td>{{$item->inisiator}}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>
                                    <a href="{{ asset('../../uploads/surat/' . $item->file_surat) }}"
                                        class="btn btn-secondary btn-sm" target="_blank">Download Surat</a>
                                        <a href="{{ route('adminSurat.edit', $item->id_surat) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('adminSurat.destroy', $item->id_surat) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
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
