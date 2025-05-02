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
    <header class="sticky-top">
        <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand fw-bold" href="{{ route('student.dashboard') }}">PustakaLoka</a>
    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('student.dashboard') }}">Our Books</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('student.all.books') }}">All Books</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('student.borrow.all') }}">Borrow</a></li>
                    </ul>
                </div>
    
                <div class="d-none d-lg-block">
                    <a href="{{ route('logout') }}" class="btn btn-nav fw-semibold"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    
{{-- end navbar --}}

    @yield('content')

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
          <p class="small">Get the freshest PustakaLoka news</p>
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






    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- js --}}
    <script>
window.addEventListener('scroll', function () {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 10) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});

    </script>

</body>


</html>