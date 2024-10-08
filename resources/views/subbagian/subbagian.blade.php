@extends('layout.base')
@section('title')
    Admin | Data Sub Bidang Kepegawaian
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data Sub Bidang Kepegawaian</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    {{ $subbagian->count() }}
                </h3>

                <p>Sub Bidang Kepegawaian</p>
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
                <h3 class="card-title">Data Sub Bagian Kepegawaian</h3>
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
                        <a href="{{ route('subbagian.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
                    
                </div>
                
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            {{-- <th>Jabatan</th> --}}
                            
                            <th>Sub Bidang Pekerjaan</th>
                            <th>Bidang Pekerjaan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subbagian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $item->jabatans->nama_jabatan }}</td> --}}
                                <td>{{ $item->nama_sub_bagian }}</td>
                                <td>{{ $item->bagians->nama_bagian }}</td>
                                <td>
                                    {{-- <a href="{{ route('bagian.show', $item->id_bagian) }}"
                                        class="btn btn-info btn-sm">Detail</a> --}}
                                    <a href="{{ route('subbagian.edit', $item->id_sub_bagian) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('subbagian.destroy', $item->id_sub_bagian) }}" method="POST"
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
