<!-- sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="profile" />
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">{{ Auth::user()->role }}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    {{-- Category --}}
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('Category') }}">List Category</a>
          </li>
        </ul>
      </div>
    </li>

    {{-- Siswa --}}
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#student" aria-expanded="false" aria-controls="student">
        <span class="menu-title">Siswa</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="student">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="#">Daftar Siswa</a>
          </li>
        </ul>
      </div>
    </li>

    {{-- Buku --}}
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ebook" aria-expanded="false" aria-controls="ebook">
        <span class="menu-title">Buku</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ebook">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('book') }}">List Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('book.create') }}">Tambah Buku</a>
          </li>
        </ul>
      </div>
    </li>
    {{-- borrow --}}
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#borrowing" aria-expanded="false" aria-controls="borrowing">
        <span class="menu-title">Peminjaman</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="borrowing">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('borrowing.unreturned') }}">Peminjam Aktif</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('borrowing.returned') }}">Dikembalikan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('borrowing.all') }}">Semua peminjaman</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
  
</nav>
<!-- end sidebar -->