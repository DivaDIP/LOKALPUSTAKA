@extends('template.base')

@section('title', 'dashboard Admin')

@section('content')

@if(session('message'))

<div class="alert alert-success">
    {{session('message')}}
</div>

@endif

<div class="page-header">
  <h3 class="page-title">Data kategori buku perpustakaan IDN</h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
</div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h4 class="card-title">List Category Book</h4>
            <button class="btn btn-rounded btn-gradient-info" data-bs-toggle="modal" data-bs-target="#CategoryModal">Add category</button>
        </div>
        </p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th> ID Category</th>
              <th> Name</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($categories as $category)
            <tr>
              <td> {{$category->id}} </td>
              <td> {{$category->name}} </td>

              <td>  
                <button class=" btn btn-rounded btn-gradient-danger" data-bs-toggle="modal" data-bs-target="#UpdateCategoryModal{{ $category->id }}">Edit</button>
                <form action="{{ route('Category.destroy', $category->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class=" btn btn-rounded btn-gradient-warning">Delete</button>
               </form>
              </td>
              
            </tr>
            @empty
            <tr>
              <td colspan="12">Tidak Ada data category</td>
            </tr>

            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

<!-- Modal Add Category -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="categoryModalLabel">Add Book Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route ('Category.store')}}" method="POST">
            @csrf
          <div class="form-group">
              <label for="name">Category</label>
              <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan Nama Kategori">
              @error('name')
              <div class="invalid-feedback">
                {{ $message}}
              </div>
              @enderror
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-rounded btn-gradient-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-rounded btn-gradient-primary">Save</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal Update Category -->
@foreach ($categories as $category)
<div class="modal fade" id="UpdateCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="categoryModalLabel">Update Kategori Buku {{ $category->name }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route ('Category.update', $category->id )}}" method="POST">
            @csrf
          <div class="form-group">
              <label for="name">Kategori</label>
              <input name="name" value="{{ old('name', $category->name)}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan Nama Kategori">
              @error('name')
              <div class="invalid-feedback">
                {{ $message}}
              </div>
              @enderror
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-rounded btn-gradient-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-rounded btn-gradient-primary">Update</button>
      </div>
  </form>
    </div>
  </div>
</div>
@endforeach



@if ($errors->any())
<script>
  document.addEventListener("DOMContentLoaded", function() {
      const categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
      categoryModal.show();
  });
</script>
@endif
@endsection