<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mycss/style.css') }}">
   
</head>


<body>


    <header class="bg-white shadow-sm sticky-top">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h3 class="text-purple m-0">E-Library IDN</h3>
            <nav>
                <a href="#books" class="mx-2 text-dark">Buku Terbaru</a>
                <a href="#categories" class="mx-2 text-dark">Kategori</a>
                <a href="#testimonials" class="mx-2 text-dark">Testimoni</a>
                <a href="#cta" class="btn btn-purple text-white ms-3">Masuk</a>
            </nav>
        </div>
    </header>


    <section class="hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di E-Library</h1>
            <p class="lead">Perpustakaan digital SMK IDN Boarding School Akhwat, lengkap, modern, dan islami.</p>
            <a href="#books" class="btn btn-light btn-lg mt-4">Lihat Buku</a>
        </div>
    </section>


    <section id="features" class="py-5">
        <div class="container text-center">
            <h2 class="section-title mb-4">Kenapa Pilih E-Library IDN?</h2>
            <div class="row">
                <div class="col-md-4">
                    <i class="mdi mdi-book-open-page-variant text-purple fs-1"></i>
                    <h5 class="mt-2">Koleksi Lengkap</h5>
                    <p>Buku pelajaran, fiksi, agama, teknologi, dan masih banyak lagi.</p>
                </div>
                <div class="col-md-4">
                    <i class="mdi mdi-cellphone-link text-purple fs-1"></i>
                    <h5 class="mt-2">Akses Mudah</h5>
                    <p>Buka perpustakaan dari perangkat manapun, kapanpun.</p>
                </div>
                <div class="col-md-4">
                    <i class="mdi mdi-account-group text-purple fs-1"></i>
                    <h5 class="mt-2">Untuk Semua</h5>
                    <p>Siswa dan guru bisa mengakses sesuai kebutuhan masing-masing.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="books" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-4">Buku Terbaru</h2>
            <div class="row">
                @foreach($books->take(4) as $book)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset($book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                            <span class="badge bg-purple">{{ $book->category->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('book') }}" class="btn btn-purple">Lihat Semua Buku</a>
            </div>
        </div>
    </section>


    <section id="categories" class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title text-center mb-5">Kategori Buku</h2>
            <div class="row justify-content-center">
                @foreach ($categories as $category)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm border-0 h-100 category-card text-center">
                        <div class="card-body">
                            <div class="category-icon mb-3">
                                <i class="bi bi-bookmarks-fill text-purple fs-1"></i>
                            </div>
                            <h5 class="card-title text-dark">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="testimonials" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title mb-4">Apa Kata Mereka?</h2>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>“E-Library IDN sangat membantu saya dalam belajar dan menambah ilmu!”</p>
                        <footer class="blockquote-footer">Aisyah, Siswi RPL</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>“Akses cepat dan koleksi bukunya luar biasa!”</p>
                        <footer class="blockquote-footer">Fatimah, Guru Bahasa</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>“Modern, islami, dan sangat berguna. Terbaik!”</p>
                        <footer class="blockquote-footer">Khadijah, Siswi DKV</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>


    <section id="cta" class="py-5 text-center" style="background-color: #9d4edd;">
        <div class="container text-white">
            <h2 class="mb-3">Siap Menjelajah Ilmu?</h2>
            <p>Gabung sekarang dan temukan buku-buku menarik setiap harinya.</p>
            <a href="{{ route('login') }}" class="btn btn-light">Masuk Sekarang</a>
        </div>
    </section>


    <footer class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between flex-wrap">
            <div>
                <h5>E-Library IDN</h5>
                <p class="small">Perpustakaan digital SMK IDN Boarding School Akhwat.</p>
            </div>
            <div>
                <h6>Kontak</h6>
                <p class="small">Jl. Raya Cileungsi - Jonggol KM. 5, Cileungsi, Bogor</p>
                <p class="small">Email: info@idn.sch.id</p>
            </div>
        </div>
        <div class="text-center mt-3 small">&copy; 2025 IDN Akhwat. All rights reserved.</div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>

