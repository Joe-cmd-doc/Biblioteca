<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;


    protected $fillable = ['start_date', 'end_date', 'user_id', 'book_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
