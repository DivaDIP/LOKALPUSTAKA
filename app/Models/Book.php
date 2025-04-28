<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title',
    'author',
    'publiction',
    'year',
    'stock',
    'cover',
    'category_id'
    ];

    // koneksi model kategori
    public function category() {
        return $this->BelongsTo(Category::class);
    }
}
