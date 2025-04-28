@extends('student.base')
@section('title', 'welcome student')

@section('content')

<section class="py-5 min-vh-100 bg-light">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                <img src="{{ asset($book->cover) }}" alt="" class="img-fluid rounded shadow-sm" style="max-height: 450px; object-fit: cover;">
            </div>
            <div class="col-md-7">
                <h2 class="text-purple">{{ $book->title }}</h2>
                <p class="text-muted mb-2">Penulis: <strong>{{ $book->author }}</strong></p>
                <p class="text-muted mb-2">Tahun: {{ $book->year }}</p>
                <p class="text-muted mb-2">Penerbit: {{ $book->publiction }}</p>
                <p class="text-muted mb-2">Kategori: <span class="badge bg-purple">{{ $book->category->name }}</span></p>
                <p class="text-muted mb-2">Stok Tersedia: {{ $book->stock }}</p>


                <hr>
                <p class="mb-4">Tidak ada deskripsi untuk buku ini</p>


                @if($book->stock > 0) 
                @if($isAlreadyBorrowed)
                {{-- kondisi ketika sudah dipinjam dan stock masih ada --}}
                <button type="submit" class="btn btn-secondary btn-lg" disabled>
                    <i class="bi bi-check-circle"></i> Buku telah dipinjam
                </button>
                @else
                {{-- kondisi buku belum dipinjam dan masih ada --}}
                    <form action="{{ route('student.borrow', $book->id)}}" method="POST">
                        @csrf
                        <input name="book_id" value="{{ $book->id }}" type="hidden">
                <button type="submit" class="btn btn-purple btn-lg">
                    <i class="bi bi-journal-arrow-down"></i> Pinjam buku
                </button>

                    </form>
                @endif
                @else
                {{-- stock tidak tersedia --}}
                    <div class="alert alert-warning">Buku tidak tersedia</div>
                @endif







                {{-- <button class="btn btn-secondary btn-lg" disabled>
                    <i class="bi bi-check-circle"></i> Buku Telah Dipinjam
                </button> --}}
                
            </div>
        </div>
    </div>
</section>

@endsection