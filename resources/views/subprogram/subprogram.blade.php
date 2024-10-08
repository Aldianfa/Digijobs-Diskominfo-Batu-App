@extends('layout.base')
@section('title')
    Admin | Data Sub Program Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Sub Program Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    {{ $subprogram->count() }}
                </h3>

                <p>Sub Program Kerja</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Sub Program Kegiatan</h3>
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
                        <a href="{{ route('subprogram.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Program</th>
                            <th>Kode Sub Program</th>
                            <th>Nama Sub Program</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subprogram as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                <td width="5%">{{ $item->programs->nama_program }}</td>
                                <td width="20%">{{ $item->kode_sub_program }}</td>
                                <td width="50%">{{ $item->nama_sub_program }}</td>
                                <td width="20%">
                                    <a href="{{ route('subprogram.edit', $item->id_sub_program) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('subprogram.destroy', $item->id_sub_program) }}" method="POST"
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
