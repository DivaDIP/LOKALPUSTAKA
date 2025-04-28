@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title">Tambah data buku baru</h3>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">Silahkan isi untuk menambahkan halaman baru</h4>
                <form class="forms-sample" action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Judul Buku</label>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Masukkan Judul Buku">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Pilih Kategori Buku</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option selected disabled>Pilih kategori buku...</option>
                            @foreach ( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="author">penulis</label>
                        <input name="author" type="text" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="Masukkan penulis">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="publiction">penerbit</label>
                        <input name="publiction" type="text" class="form-control @error('publiction') is-invalid @enderror" id="publiction" placeholder="Masukkan Penerbit">
                        @error('publiction')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="year">Tahun Cetak</label>
                        <input name="year" type="text" type="number" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="Masukkan tahun cetak">
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input name="stock" type="text" type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Masukkan stok">
                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="cover">Upload Cover</label>
                        <input name="cover" type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" placeholder="Masukan Stok">
                        @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection