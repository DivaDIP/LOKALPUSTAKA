<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome() {
        $books = Book::latest()->take(4)->get();
        $categories = Category::all();
        return view('welcome', compact('books', 'categories'));
    }
}
