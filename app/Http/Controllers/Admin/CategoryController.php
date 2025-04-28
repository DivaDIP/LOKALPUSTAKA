<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
        $request-> validate([
            'name'=> 'required|string|max:225',

            [
                'name.required' => 'nama wajib di isi',
                'name.string'   =>'nama wajib huruf',
                'name.max:225'  => 'nama lebih dari 225 karakter',
            ]
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('Category')->with('message', ' berhasil menambahkan data kategori');
    }

    public function update(Request $request, $id) {
        $request-> validate([
            'name'=> 'required|string|max:225',

            [
                'name.required' => 'nama wajib di isi',
                'name.string'   =>'nama wajib huruf',
                'name.max:225'  => 'nama lebih dari 225 karakter',
            ]
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('Category')->with('message', 'berhasil update data kategori');
    }

    // delete
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('Category')->with('message', 'berhasil mengahpus data kategori');
    }
}