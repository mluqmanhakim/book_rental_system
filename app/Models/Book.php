<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'authors', 'description', 'released_at', 'cover_image', 'pages', 'language_code', 'isbn', 'in_stock'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function allowed_to_borrow($user_id)
    {
        $active_rentals = Borrow::where('reader_id', $user_id)
                            ->where('book_id', $this->id)
                            ->whereIn('status', ['PENDING', 'ACCEPTED'])
                            ->get();
        return ($active_rentals->count() > 0) ? False : True;
    }

    public function available_books()
    {
        $active_rentals = Borrow::where('book_id', $this->id)
                            ->where('status', 'ACCEPTED')
                            ->get();
        $available_book = $this->in_stock - $active_rentals->count();
        return $available_book;
    }
}
