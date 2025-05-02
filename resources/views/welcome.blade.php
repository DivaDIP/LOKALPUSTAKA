<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mycss/style.css') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


</head>


<body style="background-color: #EEEEEE;">

    <header class="shadow-sm sticky-top bg-white mb-2">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <!-- Logo -->
                <a href="#" class="navbar-brand fw-bold text-dark fs-4">PustakaLoka</a>
    
                <!-- Menu Tengah -->
                <nav class="d-flex align-items-center gap-4">
                    <a href="#books" class="nav-link text-dark">Our Books</a>
                    <a href="#categories" class="nav-link text-dark">All Category</a>
                    <a href="#testimonials" class="nav-link text-dark">Our Testimoni</a>
                    <a href="#cta" class="nav-link text-dark"></a>
                </nav>
    
                <!-- Button -->
                <a href="{{ route('login') }}" class="btn btn-nav fw-semibold">Get Started</a>
            </div>
        </div>
    </header>

{{-- hero section --}}
   <section class="hero-section mt-5 mb-5">
        <div class="container">
          <div class="row align-items-center">
            
            <!-- Kiri: Text -->
            <div class="col-md-6">
              <h1 class="fw-bold mb-3" style="font-size: 2.8rem; color: #1d1d1d;">
                Find the book <br> you’re looking for <br> easier to read.
              </h1>
              <p class="text-muted mb-4" style="font-size: 1rem;">
                The most appropriate book site to reach books
              </p>
      
              <!-- Search Bar -->
              <form class="d-flex">
                <input type="text" class="form-control form-control-lg rounded-start-pill" placeholder="Find your favorite book here...">
                <button type="submit" class="btn rounded-end-pill px-4 text-white fw-bold" style="background-color: #666666;">
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

      {{-- why choose us --}}
      <section class="why-section py-5 mt-5 pt-5 mb-12">
        <div class="container text-center">
          <h2 class="fw-bold mb-4">Why Choose Us?</h2>
          <p class="mb-5 text-muted">We provide the best books for all ages with a simple, fun and efficient experience.</p>
          <div class="row g-4 justify-content-center">
            
            <div class="why-card col-md-4">
              <div class="p-4 rounded-4 why-card h-100" style="background-color: #BBBBBB;">
                <h5 class="fw-semibold mb-2">Easy to Use</h5>
                <p class="mb-0 text-muted">Our platform is designed with simplicity in mind, making it easy to find your next favorite book.</p>
              </div>
            </div>
            
            <div class="why-card col-md-4">
              <div class="p-4 rounded-4 why-card h-100" style="background-color: #BBBBBB;">
                <h5 class="fw-semibold mb-2">Wide Collection</h5>
                <p class="mb-0 text-muted">Access thousands of books, from academic materials to novels and self-help books.</p>
              </div>
            </div>
      
            <div class="why-card col-md-4">
              <div class="p-4 rounded-4 why-card h-100" style="background-color: #BBBBBB;">
                <h5 class="fw-semibold mb-2">Verified Sources</h5>
                <p class="mb-0 text-muted">All books are curated and uploaded by verified users and professionals.</p>
              </div>
            </div>
      
          </div>
        </div>
      </section>
      {{-- end why choose us --}}

{{-- book section --}}
<section id="books" class="py-5 mb-5">
  <div class="container">
      <h2 class="section-title text-center mb-5 text-purple">Our Book</h2>
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
  </div>
</section>
{{-- end book section --}}

{{-- category --}}
<section id="categories" class="py-5 mb-5">
  <div class="container">
      <div class="text-center mb-5">
          <h2 class="fw-bold">Our Category</h2>
          <p class="text-muted">Temukan berbagai jenis buku yang bisa kamu jelajahi</p>
      </div>

      <div class="row justify-content-center g-4">
          @foreach ($categories as $category)
          <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
              <div class="category-card text-center w-100 category-card p-4">
                  <div class="mb-3">
                      <div class="icon-circle mx-auto">
                          <i class="bi bi-book fs-2 text-white"></i>
                      </div>
                  </div>
                  <h5 class="fw-semibold">{{ $category->name }}</h5>
                  <p class="text-muted mb-0">Koleksi buku seputar {{ strtolower($category->name) }} untuk menambah wawasanmu.</p>
              </div>
          </div>
          @endforeach
      </div>
  </div>
</section>
{{-- end category --}}

{{-- testimonial section --}}
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
{{-- end testimonial section --}}

{{-- footer --}}
<footer class="footer-dark text-white py-5">
  <div class="container">
    <div class="row gy-4">

      <!-- Left Links -->
      <div class="col-md-6 col-lg-4">
        <h5 class="fw-bold mb-3">PustakaLoka</h5>
        <ul class="list-unstyled small">
          <li><a href="#" class="footer-link">Home</a></li>
          <li><a href="#" class="footer-link">Our Books</a></li>
          <li><a href="#" class="footer-link">All Books</a></li>
          <li><a href="#" class="footer-link">About us</a></li>
        </ul>
      </div>

      <!-- Mid Links -->
      <div class="col-md-6 col-lg-4">
        <ul class="list-unstyled small mt-md-4 pt-md-2">
          <li><a href="#" class="footer-link">Consumer care</a></li>
          <li><a href="#" class="footer-link">Alumni</a></li>
          <li><a href="#" class="footer-link">Chobani® Canada</a></li>
          <li><a href="#" class="footer-link">Chobani® Mexico</a></li>
        </ul>
      </div>

      <!-- Right Newsletter -->
      <div class="col-lg-4">
        <p class="small">Get the freshest Chobani news</p>
        <form class="d-flex mb-2">
          <input type="email" class="form-control me-2" placeholder="Your email here">
          <button class="btn btn-outline-light">Subscribe</button>
        </form>
        <div class="form-check small">
          <input class="form-check-input" type="checkbox" id="ageCheck">
          <label class="form-check-label" for="ageCheck">
            By checking the box, you agree that you are at least 16 years of age.
          </label>
        </div>
      </div>

    </div>

    <!-- Social Media -->
    <div class="icon-footer d-flex justify-content-start gap-3 mt-4" style="color: #ffff;">
      <a href="#" class="text-white-50 fs-5"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-white-50 fs-5"><i class="bi bi-instagram"></i></a>
      <a href="#" class="text-white-50 fs-5"><i class="bi bi-twitter"></i></a>
      <a href="#" class="text-white-50 fs-5"><i class="bi bi-pinterest"></i></a>
      <a href="#" class="text-white-50 fs-5"><i class="bi bi-youtube"></i></a>
    </div>

    <hr class="border-top mt-4 border-light-subtle">

    <!-- Bottom Links -->
    <div class="d-flex flex-wrap justify-content-start small text-white-50 gap-3">
      <a href="#" class="footer-link">Website Terms</a>
      <a href="#" class="footer-link">Privacy Policy</a>
      <a href="#" class="footer-link">Accessibility Statement</a>
      <a href="#" class="footer-link">CA Transparency</a>
      <a href="#" class="footer-link">Supplier Code</a>
      <a href="#" class="footer-link">Do Not Sell My Info</a>
    </div>

    <div class="small text-white-50 mt-2">&copy; 2025 PustakaLoka, Diva. All Rights Reserved.</div>
  </div>
</footer>

{{-- end footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>

