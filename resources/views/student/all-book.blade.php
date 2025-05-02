@extends('student.base')
@section('title', 'Semua Buku Berdasarkan Kategori')


@section('content')
<section class="py-5 min-vh-100 ">
    <div class="container">
        <h2 class="mb-4 text-purple fw-bold">Semua Buku Berdasarkan Kategori</h2>


        @foreach($categories as $category)
            @if($category->books->count())
                <div class="mb-5">
                    <h4 class="mb-3 text-dark fw-semibold">{{ $category->name }}</h4>


                    <div class="scrolling-wrapper d-flex gap-4 overflow-auto pb-2">
                        @foreach($category->books as $book)
                            <a href="{{ route('student.book.show', $book->id) }}" class="text-decoration-none">
                                <div class="book-card shadow-sm rounded bg-white border h-100" style="min-width: 180px; max-width: 180px; transition: transform 0.2s ease;">
                                    <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="rounded-top" style="height: 240px; width: 100%; object-fit: cover;">
                                    <div class="p-2">
                                        <h6 class="text-purple fw-semibold mb-1 text-truncate" title="{{ $book->title }}">{{ $book->title }}</h6>
                                        <p class="text-muted mb-0" style="font-size: 0.85rem;">{{ $book->author }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>


@endsection
