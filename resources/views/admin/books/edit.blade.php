@extends('template.base')

@section('title', 'Update Data Buku')

@section('content')

@if(session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-header">Update Data Buku Perpustakaan IDN</h3>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Silahkan isi untuk memperbaharui data buku</h4>

            <form class="forms-sample" action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="title">Judul Buku</label>
                <input value="{{ $book->title }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Masukan judul">
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="category">Kategori Buku</label>
                <select name="category_id" id="category_id" class="form-select">
                  <option selected disabled>{{ $book->category->name }}</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}"
                    {{ old('category_id', $book->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="author">Penulis</label>
                <input value="{{ $book->author }}" type="text" name="author" class="form-control @error('title') is-invalid @enderror" id="author" placeholder="Masukan nama penulis">
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="publiction">Penerbit</label>
                <input value="{{ $book->publiction }}" type="text" name="publiction" class="form-control @error('publiction') is-invalid @enderror" id="publiction" placeholder="Masukan nama penerbit">
                @error('publiction')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="year">Tahun Cetak</label>
                <input value="{{ $book->year }}" type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="Masukan tahun cetak">
                @error('year')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="stock">Stok</label>
                <input value="{{ $book->stock }}" type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Masukan stok buku">
                @error('stock')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="cover">Upload Cover Buku</label>
                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="cover" placeholder="Masukan cover buku">
                @error('cover')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($book->cover) }}" alt="{{ $book->title }}">
                </div>
            </div>
              
              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>




@endsection