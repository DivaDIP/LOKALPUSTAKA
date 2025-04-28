<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $this->validateBook($request);

        // menyimpan si cover
        $coverImage = $request->file('cover');
        $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('cover_images'), $coverImageName);

        Book::create([
            'title'      => $request->title,
            'author'     => $request->author,
            'year'       => $request->year,
            'category_id' => $request->category_id,
            'publiction'  => $request->publiction,
            'stock'      => $request->stock,
            'cover'      => 'cover_images/' . $coverImageName
        ]);

        return redirect()->route('book')->with('message', 'Berhasil menambahkan data buku');
    }

    // detail buku
    public function detail($id)
    {
        $book = Book::find($id);
        // return $book->id;
        return view('admin.books.detail', compact('book'));
    }

    // edit
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('categories', 'book'));
    }

    //update
    public function update(Request $request, $id)
    {
        $this->validateBook($request);

        //mengambil data yang mau diupdate
        $book = Book::findOrFail($id);

        // jika ada cover baru, up dan hapus yang lama
        if ($request->hasFile('cover')) {
            //hapus cover lama
            if ($book->cover && file_exists(public_path($book->cover))) {
                unlink(public_path($book->cover));
            }

            //upload baru

            //Update data baru
            $coverImage = $request->file('cover');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('cover_images'), $coverImageName);


            // set pat
            $book->cover = 'cover_images/' . $coverImageName;
        }

        // update cover
        $book->update([
            'title'      => $request->title,
            'author'     => $request->author,
            'year'       => $request->year,
            'category_id' => $request->category_id,
            'publiction'  => $request->publiction,
            'stock'      => $request->stock
        ]);

        return redirect()->route('book.detail', $book->id)->with('message', 'Berhasil mengubah data buku');
    }

    // hapus data
    public function destroy($id) {
        $book = Book::findOrFail($id);

        // hapus cover
        if($book->cover && file_exists(public_path($book->cover))) {
            unlink(public_path($book->cover));
        }

        // menghapus data
        $book->delete();

        return redirect()->route('book')->with('message', 'Buku berhasil dihapus');
    }

    public function validateBook(Request $request)
    {
        // syarat validasi
        $rules = [
            'title'             => 'required|string|max:225',
            'author'            => 'required|string|max:225',
            'year'              => 'required|numeric',
            'category_id'       => 'required|numeric',
            'publiction'         => 'required|string|max:225',
            'stock'             => 'required|numeric',

        ];
        if ($request->isMethod('post')) {
            //create data
            $rules['cover'] = 'required|image|mimes:jpeg, png, jpg|max:2048';
        } else {
            //saat update
            $rules['cover'] = 'nullable|image|mimes:jpeg, png, jpg|max:2048';
        }

        $request->validate($rules);
    }
}
