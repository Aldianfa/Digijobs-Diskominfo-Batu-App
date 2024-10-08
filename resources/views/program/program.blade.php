@extends('layout.base')
@section('title')
    Admin | Data Program Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Program Kegiatan</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>
                    {{ $program->count() }}
                </h3>

                <p>Program Kerja</p>
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
                <h3 class="card-title">Data Program Kegiatan</h3>
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
                        <a href="{{ route('program.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
                    
                </div>
                
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kepentingan</th>
                            <th>Kode Program</th>
                            <th>Nama Program</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($program as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->urusans->nama_urusan }}</td>
                                <td>{{ $item->kode_program }}</td>
                                <td>{{ $item->nama_program }}</td>
                                <td>
                                    <a href="{{ route('program.edit', $item->id_program) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('program.destroy', $item->id_program) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau menghapus program ini?')">Hapus</button>
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
