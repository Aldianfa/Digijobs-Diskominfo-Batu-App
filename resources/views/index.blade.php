<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Go-Archieve+</title>

        
    </head>

    <body>
       
        
         <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navi fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../img/logokominfo.png" width="40" height="40" class="me">
                    <img src="../img/logoKotaBatu.jpg" width="35" height="40" class="me">
                    <img src="../img/logogoarchieve.png" width="35" height="40" class="me">
                    {{-- <a class="navbar-brand fw-bold fs-4 me-auto" href="index.php">Sneaky.Co</a> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    
                </div>

                @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-warning fs-8 m-2" type="submit" onclick="return confirm('Yakin Anda Logout?')">LogOut</button>
                </form>
                @endauth
                
            </div>
        </nav>
        
        <!-- JUMBOTRON -->
            <div class="row p-5 ">
                <div class="col-md-5 col-12">
                    <div class="p-5 mb-4">
                        <div class="container py-4">
                            <h1 class="display-4 fw-bold">GoArchieve+</h1>
                            <p class="col-md-10 fs-5">Merupakan aplikasi sistem digitalisasi kegiatan pada Dinas Kominfo Kota Batu yang digunakan untuk Memberikan akses mudah dan transparansi terhadap kegiatan dan informasi terkait Dinas Kominfo untuk masyarakat umum.</p>
                            @guest
                            <a class="btn btn-primary fs-4" href="/login">Mulai!</a>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12 ms-auto mt-5" >
                    <div class="container">
                    <img src="../img/dashboard.jpg" width="700" height="500">
                    </div>
                </div>
            </div>
        <!--  -->
        
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>