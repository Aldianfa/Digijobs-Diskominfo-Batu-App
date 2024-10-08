@extends('layout.base')
@section('title')
    Admin | Data Indikator kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1 class="bg-white"> Indikator Kerja </h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    {{ $indikator->count() }}
                </h3>

                <p>Indikator Kerja</p>
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
                <h3 class="card-title">Data Indikator kerja</h3>
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
                        <a href="{{ route('indikator.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Urusan</th>
                            <th>Program</th>
                            <th>Indikator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indikator as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                <td width="10%">{{ $item->programs->urusans->nama_urusan }}</td>
                                <td width="15%">{{ $item->programs->nama_program }}</td>
                                <td width="50%">{{ $item->nama_indikator }}</td>
                                <td width="20%">
                                    <a href="{{ route('indikator.edit', $item->id_indikator) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('indikator.destroy', $item->id_indikator) }}" method="POST"
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
