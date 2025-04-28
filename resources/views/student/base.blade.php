<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('mycss/student.css') }}">


</head>


<body>


    <!-- Header Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand" href="{{ route('student.dashboard') }}">
                <i class="bi bi-book-half me-2"></i> E-Library IDN Akhwat
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('student.dashboard') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('student.all.books') }}">Semua Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('student.borrow.all') }}">Pinjamanku</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a></li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </ul>
            </div>
        </nav>
    </header>


    @yield('content')



    <!-- Footer -->
<footer class="text-white text-center text-lg-start bg-purple mt-5">
    <div class="container p-4">
        <div class="row">
            <!-- Info Sekolah -->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="fw-bold">📚 E-Library SMK IDN Akhwat</h5>
                <p class="small">
                    Kami menyediakan kemudahan akses buku digital untuk seluruh siswi SMK IDN Boarding School Akhwat. Baca dan pinjam buku favoritmu dari mana saja dengan mudah.
                </p>
            </div>


            <!-- Navigasi -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h6 class="fw-bold">Navigasi</h6>
                <ul class="list-unstyled">
                    <li><a href="#books" class="text-white text-decoration-none d-block py-1">📖 Buku Terbaru</a></li>
                    <li><a href="#search" class="text-white text-decoration-none d-block py-1">🔍 Cari Buku</a></li>
                    <li><a href="#all-books" class="text-white text-decoration-none d-block py-1">📚 Semua Buku</a></li>
                </ul>
            </div>


            <!-- Kontak -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h6 class="fw-bold">Kontak Kami</h6>
                <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i> Jonggol, Bogor, Indonesia</p>
                <p><i class="bi bi-envelope-fill me-2"></i> elibrary@idn.sch.id</p>
            </div>
        </div>
    </div>


    <div class="text-center py-3 text-white-50">
        © {{ date('Y') }} SMK IDN Boarding School Akhwat. All rights reserved.
    </div>
</footer>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>