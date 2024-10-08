@extends('layout.base')
@section('title')
    Admin | Tambah Pengguna
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>Edit Data Pengguna</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/pegawai" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">Edit Pengguna</h5>
            <div class="card-body">
                <form action="/pegawai/{{ $pengguna->id }}/update/" method="POST" class="form-register">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " name="nama"
                            required placeholder="nama lengkap" value="{{ old('nama', $pengguna->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        {{-- <div class="col-md-4">
                            <div class="mb-3">
                                <label for="kepegawaian">Status Kepegawaian</label>
                                <select name="kepegawaian" id="kepegawaian" class="form-control">
                                    <option value="">Pilih Status Kepegawaian</option>
                                    <option value="pns" @if ($pengguna->kepegawaian == 'pns') selected @endif>PNS</option>
                                    <option value="non-pns" @if ($pengguna->kepegawaian == 'non-pns') selected @endif>Non PNS
                                    </option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="username" class="form-label">NIP</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" required placeholder="nip"
                                    value="{{ old('username', $pengguna->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="level" class="form-label">Pilih Role</label>
                                <div class="form-check">
                                    <input class="form-check-input" name="level" type="radio" value="user"
                                        id="flexCheckDefault"checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        User
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level" type="radio" value="admin"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="level" type="radio" value="pejabat"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Pejabat
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="bagian" class="form-label">Bagian</label>
                            <select name="bagian" id="bagian" class="form-control" aria-placeholder="Pilih bagian">
                                <option value="">Pilih Bagian</option>
                                <option value="1">Kepala Dinas</option>
                                <option value="2">Sekretariat</option>
                                <option value="3">Bidang Pengelolaan Informasi Publik</option>
                                <option value="4">Bidang Data dan Statistik</option>
                                <option value="5">Bidang Aplikasi Informatika dan Persandian</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subbagian" class="form-label">Sub Bagian</label>
                            <select name="subbagian.dropdown" id="subbagian" class="form-control"
                                aria-placeholder="Pilih Sub Bagian">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select name="id_jabatan" id="jabatan" class="form-control" aria-placeholder="Pilih Jabatan">
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kepegawaian">Status Kepegawaian</label>
                            <select name="kepegawaian" id="kepegawaian" class="form-control">
                                <option value="">Pilih Status Kepegawaian</option>
                                <option value="pns" @if ($pengguna->kepegawaian == 'pns') selected @endif>PNS</option>
                                <option value="non-pns" @if ($pengguna->kepegawaian == 'non-pns') selected @endif>Non PNS
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="no_hp">No WhatsApp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                placeholder="Masukkan No WhatsApp" value="{{ old('no_hp', $pengguna->no_hp) }}">
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select class="form-control" name="id_jabatan" id="id_jabatan">
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id_jabatan }}"
                                            @if ($item->id_jabatan == $pengguna->id_jabatan) selected @endif>
                                            {{ $item->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                    </div> --}}

                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email', $pengguna->email) }}" name="email"
                                    placeholder="contoh@gmail.com"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required="" placeholder="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-block">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        //on document ready jquery
        $(document).ready(function() {
            // send ajax request to get the program of the selected bagian and append to the select tag       
            function onChangeSubbagianSelect(url, id_bagian, nama_bagian) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_bagian: id_bagian
                    },
                    success: function(data) {
                        // $('#program').empty();
                        // $('#program').append('<option>Pilih Program</option>');
                        // $.each(data, function (key, value) {
                        //     $('#program').append('<option value="' + key + '">' + value + '</option>');
                        // });

                        let select = $('#subbagian');
                        select.empty();
                        select.attr('placeholder', 'Pilih sub bagian');
                        select.append('<option value="">Pilih sub bagian</option>');
                        $.each(data, function(key, value) {
                            select.append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }

            function onChangeJabatanSelect(url, id_sub_bagian, nama_sub_bagian) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_sub_bagian: id_sub_bagian
                    },
                    success: function(data) {
                        $('#jabatan').empty();
                        $('#jabatan').append('<option>Pilih Jabatan Kerja</option>');

                        $.each(data, function(key, value) {
                            $('#jabatan').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            }

            $('#subbagian').attr('disabled', true);
            $('#jabatan').attr('disabled', true);

            $(function() {
                $('#bagian').change(function() {
                    var id_bagian = $(this).val();
                    var url = "{{ URL::to('subbagian-dropdown') }}";
                    var nama_bagian = "nama_sub_bagian";
                    $('#subbagian').attr('disabled', false).empty();
                    $('#jabatan').attr('disabled', true).empty();
                    onChangeSubbagianSelect(url, id_bagian, nama_bagian);

                });
            });

            $(function() {
                $('#subbagian').change(function() {
                    var id_sub_bagian = $(this).val();
                    var url = "{{ URL::to('jabatan-dropdown') }}";
                    var nama_sub_bagian = "nama_jabatan";

                    $('#jabatan').attr('disabled', false);
                    onChangeJabatanSelect(url, id_sub_bagian, nama_sub_bagian);

                });
            });



        });
    </script>
@endsection
