@extends('layout.base')
@section('title')
    Admin | Data Pengguna
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Data User</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    {{ $pengguna->count() }}
                </h3>

                <p class="fs-24">Pengawai</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>

                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table id="example3" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status Kepegawaian</th>
                            <th>Jabatan</th>
                            
                            <th>NIP</th>
                            {{-- <th>Email</th> --}}
                            {{-- <th>Role</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->kepegawaian }}</td>
                                <td>{{ $user->jabatans->nama_jabatan }}</td>
                                
                                <td>{{ $user->username }}</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                {{-- <td>{{ $user->level }}</td> --}}
                                <td width="20%">
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm"
                                        data-id="{{ $user->id }}">Detail</a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                        data-id="{{ $user->id }}">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau menghapus user ini?')">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <table id="tabel" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->id_bagian }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level }}</td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm"
                                        data-id="{{ $user->id }}">Detail</a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                        data-id="{{ $user->id }}">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau menghapus user ini?')">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    </div>
@endsection
