@extends('layout.base')
@section('title')
    Admin | Detail Pengguna
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Detail Data Pengguna</h1>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <a href="/pegawai" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Detail Data</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required placeholder="nama lengkap"
                        value="{{ $pengguna->nama }}" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="id_jabatan" value="{{ $pengguna->jabatans->nama_jabatan}}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kepegawaian" class="form-label">Status Kepegawaian</label>
                            <input type="text" class="form-control" name="kepegawaian" value="{{ $pengguna->kepegawaian }}"
                                readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="level" class="form-label">Role :</label>
                            <input type="text" class="form-control" name="level" required placeholder="User"
                                value="{{ $pengguna->level }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">NIP</label>
                            <input type="text" class="form-control" name="username" required placeholder="nip"
                                value="{{ $pengguna->username }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" required placeholder="email"
                            value="{{ $pengguna->email }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" name="no_hp" required placeholder="no_hp"
                            value="{{ $pengguna->no_hp }}" readonly>
                    </div>

                </div>
                
            </div>
        </div>
    @endsection
