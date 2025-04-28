<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'borrowed_at',
        'return_at',
        'status'
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}