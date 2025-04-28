@extends('template.base')


@section('title', 'Peminjaman Buku')


@section('content')


@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">Data Peminjaman Buku</h4>
            <p class="card-description">Berikut adalah data peminjaman buku oleh siswa</p>


            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $borrowing)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $borrowing->user->name }}</td>
                            <td>{{ $borrowing->book->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrowing->borrowed_at)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrowing->return_at)->format('d M Y') }}</td>
                            <td>
                                @if($borrowing->status === 'dikembalikan')
                                <span class="badge bg-success">Dikembalikan</span>
                                @elseif($borrowing->status === 'dipinjam')
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                                @else
                                <span class="badge bg-dange">Tidak Diketahui</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @if($borrowings->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data peminjaman.</td>
                        </tr>
                        @endif


                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $borrowings->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>




@endsection
