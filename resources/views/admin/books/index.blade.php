@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

@if(session('message'))

<div class="alert alert-success">
    {{session('message')}}
</div>

@endif

<div class="page-header">
  <h3 class="page-title">Data buku perpustakaan IDN</h3>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data List Buku</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> ID Buku </th>
              <th> Title </th>
              <th> Status </th>
              <th> Action </th>
            </tr>
          </thead>

          <tbody>
            @forelse ($books as $book)
            <tr>
              <td> {{ $book->id }} </td>
              <td> {{ $book->title }} </td>
              <td> 
                  @if ($book->stock > 0) 
                      <span class="badge bg-success">Tersedia {{ $book->stock }}</span>
                  @else 
                      <span class="badge bg-danger">Tidak tersedia</span>
                  @endif  
              </td>
              <td>
                <a href="{{ route('book.detail', $book->id) }}" class="btn btn-gradient-success btn-sm">
                  <i class="fas fa-eye">
                  </i>
                </a>

                <a href="#" class="btn btn-gradient-warning btn-sm">
                  <i class="fas fa-pencil">
                  </i>
                </a>

                <a href="#" class="btn btn-gradient-danger btn-sm">
                  <i class="fas fa-trash">
                  </i>
                </a>
              </td>
            </tr>

            @empty

            <tr>
              <td colspan="7">tidak ada buku</td>
            </tr>
            @endforelse
          </tbody>
        </table>

        {{-- pagination --}}
        <div class="d-flex justify-content-center mt-3">
          {{ $books->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
  </div>

@endsection