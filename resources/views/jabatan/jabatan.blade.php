@extends('layout.base')
@section('title')
    Admin | Data Jabatan Pegawai
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Jabatan</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    {{ $jabatan->count() }}
                </h3>

                <p>Jabatan</p>
            </div>
            <div class="icon">
                <i class="fas fa-network-wired"></i>
            </div>
            <a href="/jabatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Data Jabatan Pegawai</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('jabatan.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            {{-- <th>Sub Bagian Kepegawaian</th> --}}
                            <th>Jenis Jabatan</th>
                            <th>Jabatan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis_jabatan }}</td>
                                <td>{{ $item->nama_jabatan }}</td>
                                <td>
                                    <a href="{{ route('jabatan.edit', $item->id_jabatan) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('jabatan.destroy', $item->id_jabatan) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Jabatan Pegawai</h3>
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
                        <a href="{{ route('jabatan.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_jabatan }}</td>
                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
            <!-- /.card-body -->
        </div>
    </div> --}}
@endsection
