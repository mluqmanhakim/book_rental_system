<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->truncate();
        DB::table('book_genre')->truncate();
        Genre::factory()->count(10)->create();

        $books = Book::all();

        Genre::all()->each(function ($genre) use ($books) {
            $genre->books()->attach(
                $books->random(rand(1, 5))->pluck('id')->toArray()
            );  
        });
    }
}
