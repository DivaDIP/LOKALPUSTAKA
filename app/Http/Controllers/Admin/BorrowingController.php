<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrowingUnreturned() {
        // ambil data peminjaman yang statusnya = 'dipinjam'
        $borrowings = Borrow::where('status', 'dipinjam')->latest()->paginate(10);
        return view('admin.borrowing.unreturned', compact('borrowings'));
    }

    public function returnBook($id) {
        $borrowing = Borrow::findOrFail($id);

        // cek status buku
        if($borrowing->status === 'dipinjam') {
            $borrowing->status = 'dikembalikan';
            $borrowing->save();

            // up stock
            $borrowing->book->encrament('stock');

            return redirect()->back()->with('message', 'buku berhasil dikembalikan');
        }
        return redirect()->back()->with('message', 'buku sudah dikembalikan sebelumnya');
    }

    public function borrowingReturned() {
        // ambil data peminjaman yang statusnya = 'dipinjam'
        $borrowings = Borrow::where('status', 'dikembalikan')->latest()->paginate(10);
        return view('admin.borrowing.returned', compact('borrowings'));
    }

    public function borrowingAll() {
        $borrowings = Borrow::paginate(10);
        return view('admin.borrowing.borrowing-all', compact('borrowings'));
    }
}
