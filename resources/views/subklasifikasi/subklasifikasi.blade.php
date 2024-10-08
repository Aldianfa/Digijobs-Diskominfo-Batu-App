@extends('layout.base')
@section('title')
    Admin | Data Sub Klasifikasi Surat
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Sub Klasifikasi Surat</h1>
    </div>
@endsection

@section('content')
    <!-- small box -->
    <div class="col-lg-12 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>
                    {{ $subklasifikasi->count() }}
                </h3>
                <p>Sub Klasifikasi Surat</p>
            </div>
            <div class="icon">
                <i class="fas fa-paperclip"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Sub Klasifikasi Surat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('subklasifikasi.create') }}" class="btn btn-success mb-3">Tambah Data</a>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th>No.</th> --}}
                            <th width="15%">Kode Klasifikasi</th>
                            <th width="15%">Kode Sub Klasifikasi</th>
                            <th>Nama Sub Klasifikasi</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subklasifikasi as $item)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $item->klasifikasis->kode_klasifikasi }}</td>
                                <td>{{ $item->kode_sub_klasifikasi }}</td>
                                <td>{{ $item->nama_sub_klasifikasi }}</td>
                                <td>
                                    <a href="{{ route('subklasifikasi.edit', $item->id_sub_klasifikasi) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('subklasifikasi.destroy', $item->id_sub_klasifikasi) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        /
    @endsection
