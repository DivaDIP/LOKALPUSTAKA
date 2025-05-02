@extends('student.base')
@section('title', 'welcome student')

@section('content')
    

{{-- hero section --}}
<section class="animate hero-section mt-5 mb-5">
    <div class="container">
      <div class="row align-items-center">
        
        <!-- Kiri: Text -->
        <div class="col-md-6">
          <h1 class="fw-bold mb-3" style="font-size: 2.8rem;">
            Find the book you’re looking for <br> easier to read.
          </h1>
          <p class="text-muted mb-4" style="font-size: 1rem;">
            The most appropriate book site to reach books
          </p>
  
          <!-- Search Bar -->
          <form class="d-flex">
            <button class="btn btn-hero rounded-end-pill px-4 text-white fw-bold" style="background-color: #666666;">
              Search
            </button>
          </form>
        </div>
  
        <!-- Kanan: Gambar -->
        <div class="col-md-6 text-center mt-5 mt-md-0">
          <img src="{{ asset('image/holding-book.svg')}}" alt="Stack of Books" class="img-fluid">
        </div>
  
      </div>
    </div>
  </section>
  {{-- end hero section --}}

  {{-- services --}}
  <section class="animate py-3 border-top border-bottom mb-5" style="background-color: #ffff;">
    <div class="container">
        <div class="row text-center g-3">
            <div class="col-6 col-md-3">
                <i class="bi bi-cart3 fs-4 text-secondary"></i>
                <div class="mt-2">
                    <small class="fw-semibold d-block">Free Shipping</small>
                    <small class="text-muted">Over 99.99€</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <i class="bi bi-arrow-repeat fs-4 text-secondary"></i>
                <div class="mt-2">
                    <small class="fw-semibold d-block">90 Days Return</small>
                    <small class="text-muted">Goods issue only</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <i class="bi bi-shield-lock fs-4 text-secondary"></i>
                <div class="mt-2">
                    <small class="fw-semibold d-block">Secure Payments</small>
                    <small class="text-muted">100% Safe</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <i class="bi bi-headset fs-4 text-secondary"></i>
                <div class="mt-2">
                    <small class="fw-semibold d-block">24/7 Support</small>
                    <small class="text-muted">Always ready</small>
                </div>
            </div>
        </div>
    </div>
</section>
  {{-- end services --}}

<!-- Buku Terbaru -->
<section id="books" class="animate py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5 text-purple">Our Book</h2>
        <div class="row g-4">
            @foreach ($books->take(6) as $book)
            <div class="col-md-2">
                <div class="card book-card h-100 bg-white border border-muted rounded-4">
                    <img src="{{ asset($book->cover) }}" class="card-img-top rounded-top-4" alt="img">
                    <div class="card-body text-center px-2 py-3">
                        <h6 class="text-dark fw-semibold mb-2" style="font-size: 0.9rem;">{{ $book->title }}</h6>
                        <span class="d-inline-block text-muted small">{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- end buku terbaru --}}

<!-- Pencarian Buku -->
<section id="search" class="animate py-5 mb-5 mt-5" style="background-color: #FFFF;">
    <div class="container">
        <h2 class="section-title text-center text-purple mb-4">Search Book</h2>
        <form action="#" method="GET" class="d-flex justify-content-center">
            <div class="search-bar d-flex align-items-center shadow-sm">
                <span class="px-3 text-muted"><i class="bi bi-search"></i></span>
                <input type="text" name="keyword" class="form-control border-0 bg-transparent" style="background-color: #EEEEEE;" placeholder="Cari berdasarkan judul, penulis...">
                <button type="submit" class="btn btn-purple rounded-pill px-4 ms-2">Cari</button>
            </div>
        </form>
    </div>
</section>

{{-- end pencarian buku --}}

<!-- Buku ALL -->
<section id="books" class="animate py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5 text-purple">All Book</h2>
        <div class="row g-4">
            @foreach ($books->take(4) as $book)
            <div class="col-md-2">
                <div class="card book-card h-100 bg-white border border-muted rounded-4">
                    <img src="{{ asset($book->cover) }}" class="card-img-top rounded-top-4" alt="img">
                    <div class="card-body text-center px-2 py-3">
                        <h6 class="text-dark fw-semibold mb-2" style="font-size: 0.9rem;">{{ $book->title }}</h6>
                        <span class="d-inline-block text-muted small">{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('student.all.books') }}" class="btn btn-purple btn-lg rounded-pill px-5 py-2">
                Lihat Semua Buku
            </a>            
        </div>
    </div>
</section>
{{-- end buku ALL --}}

{{-- js --}}

<script>
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
        observer.unobserve(entry.target); // agar animasi 1x saja
      }
    });
  }, {
    threshold: 0.1
  });

  document.querySelectorAll('.animate').forEach(el => observer.observe(el));
</script>

@endsection