<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = ['reader_id', 'book_id', 'status', 'request_processed_at', 'request_managed_by', 'deadline', 'returned_at', 'return_managed_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'reader_id');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function managed_request_user()
    {
        return $this->hasOne(User::class, 'id', 'request_managed_by');
    }

    public function managed_return_user()
    {
        return $this->hasOne(User::class, 'id', 'return_managed_by');
    }
}
