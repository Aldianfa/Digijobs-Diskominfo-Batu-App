@extends('layout.userBase')
@section('title')
    ADMIN | Update Surat Kegiatan
@endsection

@section('content-header')
    <div class="container-fluid">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="/adminDasarsurat" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <h5 class="card-header">
                Update Surat Kegiatan
            </h5>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('adminSurat.update', $surat->id_surat) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inisiator" class="form-label">Inisiator</label>
                        <input type="text" class="form-control" id="inisiator" name="inisiator"
                            value="{{ Auth::user()->nama }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="id_sub_klasifikasi" class="form-label">
                                    Kode Klasifikasi Surat
                                </label>
                                <select class="form-control single-select-field" name="id_sub_klasifikasi"
                                    aria-label="Default select example">
                                    @foreach ($subklasifikasi as $item)
                                        <option value="{{ $item->id_sub_klasifikasi }}"
                                            {{ $surat->id_sub_klasifikasi == $item->id_sub_klasifikasi ? 'selected' : '' }}>
                                            {{ $item->klasifikasis->kode_klasifikasi }}{{ $item->kode_sub_klasifikasi }} -
                                            {{ $item->nama_sub_klasifikasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                name="nomor_surat" required placeholder="Nomor Surat" value="{{ $surat->nomor_surat }}">
                            @error('nomor_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <label for="id_skpd">SKPD</label>
                            <select class="form-control single-select-field" name="id_skpd"
                                aria-label="Default select example">
                                @foreach ($skpd as $item)
                                    <option value="{{ $item->id_skpd }}"
                                        {{ $surat->id_skpd == $item->id_skpd ? 'selected' : '' }}>{{ $item->nama_skpd }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-5">
                            <label for="tanggal_terima">Tanggal Surat</label>
                            <input type="date" name="tanggal_terima" class="form-control"
                                value="{{ $surat->tanggal_terima }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <label for="perihal">Perihal </label>
                            <textarea type="text" class="form-control @error('perihal') is-invalid @enderror" name="perihal" required
                                placeholder="Perihal Surat">{{ $surat->perihal }}</textarea>
                        </div>
                        <div class="col-md-2">
                            <label for="status_surat">Status Surat</label>
                            <select class="form-control single-select-field" name="status_surat"
                                aria-label="Default select example">
                                <option value="On Progress" {{ $surat->status_surat == 'On Progress' ? 'selected' : '' }}>
                                    On Progress</option>
                                <option value="Selesai" {{ $surat->status_surat == 'Selesai' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>


                        </div>
                    </div>
                    <div class="mt-3 mb-3">

                    </div>
                    <div class="mb-3">
                        <label for="filesurat" class="form-label">File Surat</label>
                        <input type="file" class="form-control" id="filesurat" name="filesurat"
                            value="{{ $surat->file_surat }}">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.single-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endsection
