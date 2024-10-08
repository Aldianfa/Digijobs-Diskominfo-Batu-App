@extends('layout.base')
@section('title')
    Admin | Data Bidang Kerja
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Bidang</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    {{ $bagian->count() }}
                </h3>

                <p>Bidang Kerja</p>
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
                <h3 class="card-title">Data Bagian Unit Kerja</h3>
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
                        <a href="{{ route('bagian.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
                    
                </div>
                
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            {{-- <th>Jabatan</th> --}}
                            <th>Bidang Pekerjaan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bagian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $item->jabatans->nama_jabatan }}</td> --}}
                                <td>{{ $item->nama_bagian }}</td>
                                <td>
                                    {{-- <a href="{{ route('bagian.show', $item->id_bagian) }}"
                                        class="btn btn-info btn-sm">Detail</a> --}}
                                    <a href="{{ route('bagian.edit', $item->id_bagian) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('bagian.destroy', $item->id_bagian) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau menghapus bagian ini?')">Hapus</button>
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
