<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardStudentController extends Controller
{
    public function index() {
        $books = Book::latest()->take(6)->get();
        $allBook = Book::all();
        return view('student.landing-page', compact('books', 'allBook'));
    }

    public function show($id) {
        $book = Book::findOrFail($id);
        $isAlreadyBorrowed = Borrow::where('book_id', $book->id)
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->exists();

        return view('student.show', compact('book', 'isAlreadyBorrowed'));
    }

    public function borrow(Request $request) {
        $request->validate([
            'book_id'   =>'required|exists:books,id'
        ]);

        $book = Book::findOrFail($request->book_id);

        // kurangi stock
        $book->decrement('stock');
        Borrow::create([
            'book_id'   => $request->book_id,
            'user_id'   => Auth::id(),
            'borrowed_at' => now(),
            'return_at' => now()->addDays(7),
            'status'    => 'dipinjam'
        ]);

        return redirect()->route('student.borrow.all');

    }

    public function borrowedBooks() {
        $borrowings = Borrow::with('book')
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->get();

        return view('student.borrowed', compact('borrowings'));
    }

    public function allBooks() {
        $categories = Category::with('books')->get();

        return view('student.all-book', compact('categories'));
    }
}

