<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arsip-Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>

<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <div class="row justify-content-center">
                <center><img class="mb-4 center" src="../img/logokominfo.png" alt="" width="65" height="70"></center>
                <center><img class="mb-4 center" src="../img/logoKotaBatu.jpg" alt="" width="65" height="70"></center>
                <center><img class="mb-4 center ml-2" src="../img/logogoarchieve.png" alt="" width="55" height="65"></center>
            </div>
            
            <h1 class="text-center"><strong>Go-Archieve +</strong></h1>
            <h6 class="text-center" style="color: gray;" >Sistem Informasi Digitalisasi Kegiatan dan Penilaian Kinerja</h6>
            <h6 class="text-center" style="color: gray;" >Dinas Komuuikasi dan Informatika Kota Batu</h6>
            <br>                           

            @if (session('LoginBerhasil'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('LoginBerhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('LoginGagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('LoginGagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <form action="" method="POST">
                @csrf
                <div class="mb-3 form-floating">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email"
                        class="form-control @error('email') is-invalid @enderror" autofocus required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-floating">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <button name="submit" type="submit" class="btn btn-primary w-100">Login</button>
                </div>
                {{-- <small class="d-block text-center mt-3">Belum punya akun? <a href="/register">Daftar dulu!</a></small> --}}
                {{-- <p class="mt-5 mb-3 text-muted">&copy; Release 2023</p> --}}
            </form>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
