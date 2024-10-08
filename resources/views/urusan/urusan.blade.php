@extends('layout.base')
@section('title')
    Admin | Data Urusan Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Urusan Kegiatan</h1>
    </div>
@endsection

@section('content')
    <!-- small box -->
    <div class="col-lg-12 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    {{ $urusan->count() }}
                </h3>
                <p>Urusan Kegiatan</p>
            </div>
            <div class="icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Urusan Kegiatan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('urusan.create') }}" class="btn btn-success mb-3">Tambah Data</a>
                
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">No.</th>
                            <th>Nama Urusan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($urusan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_urusan }}</td>
                                <td>
                                    <a href="{{ route('urusan.edit', $item->id_urusan) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('urusan.destroy', $item->id_urusan) }}" method="POST"
                                        class="d-inline">
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
    @endsection
