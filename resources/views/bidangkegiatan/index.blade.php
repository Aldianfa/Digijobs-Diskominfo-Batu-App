@extends('layout.base')
@section('title')
    Admin | Data Bidang Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1 class="bg-white"> Bidang Kegiatan </h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    {{ $bidangkegiatan->count() }}
                </h3>

                <p>Pejabat Penilai</p>
            </div>
            <div class="icon">
                <i class="fas fa-filter"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pejabat Penilai</h3>
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
                        <a href="{{ route('bidangkegiatan.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penilai</th>
                            <th>Bidang Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bidangkegiatan as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                <td width="40%">{{ $item->newusers->nama }}</td>
                                <td width="30%">{{ $item->subbagians->nama_sub_bagian }}</td>
                                <td width="20%">
                                    <a href="{{ route('bidangkegiatan.edit', $item->id_bidang_kegiatan) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('bidangkegiatan.destroy', $item->id_bidang_kegiatan) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau menghapus sub program ini?')">Hapus</button>
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
