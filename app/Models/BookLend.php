<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLend extends Model
{
    use HasFactory;
    public $table = "book_lend";

    public $fillable = [
        'user_id',
        'book_id',
        'lend_date',
        'return_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function collection()
    {
        return $this->hasOne(Collection::class);
    }

}
