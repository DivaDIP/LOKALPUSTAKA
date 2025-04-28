@extends('student.base')
@section('title', 'welcome student')

@section('content')
    

<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #7e57c2, #512da8); color: white;">
    <div class="container text-center">
        <h1 class="fw-bold display-5 display-md-4 display-lg-3">Selamat Datang di E-Library</h1>
        <p class="lead fs-5 fs-md-6 fs-lg-6 mt-3 mb-4">Temukan, baca, dan pinjam buku favoritmu dari genggamanmu.</p>
        <a href="#books" class="btn btn-light text-purple fw-semibold px-4 py-2">Lihat Buku Terbaru</a>
    </div>
</section>

<!-- Buku Terbaru -->
<section id="books" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-4 text-purple">Buku Terbaru</h2>
        <div class="row">

            @foreach ($books->take(6) as $book)
            <div class="col-md-2 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title text-purple">{{ $book->title }}</h5>
                        <span class="badge bg-purple">{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="text-center mt-4">
            <a href="{{ route('student.all.books') }}" class="btn btn-purple px-4">Lihat Semua Buku</a>
        </div>
    </div>
</section>

<!-- Pencarian Buku -->
<section id="search" class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center text-purple mb-4">Cari Buku</h2>
        <form action="#" method="GET" class="d-flex justify-content-center">
            <input type="text" name="keyword" class="form-control w-50 rounded-start" placeholder="Cari berdasarkan judul, penulis...">
            <button type="submit" class="btn btn-purple rounded-end px-4">Cari</button>
        </form>
    </div>
</section>

<!-- Semua Buku -->
<section id="all-books" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center text-purple mb-4">Semua Buku</h2>
        <div class="row">
           @foreach($allBook as $book)
            <div class="col-md-2 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{ $book->title }}</h6>
                        <span class="badge bg-secondary">{{ $book->category->name }}</span>
                        <a href="{{ route('student.book.show', $book->id ) }}" class="btn btn-sm btn-purple mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection