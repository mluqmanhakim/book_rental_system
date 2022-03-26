<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\BorrowFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrows')->truncate();
        $books = Book::all()->pluck('id')->toArray();
        
        for ($i = 0; $i < 5; $i++) {  
            Borrow::create([
                'reader_id' => 1,
                'book_id' => $books[rand(0,9)],
                'status' => 'PENDING',
                'request_managed_by' => 2,
                'request_processed_at' => Carbon::now(),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {  
            Borrow::create([
                'reader_id' => 1,
                'book_id' => $books[rand(0,9)],
                'status' => 'ACCEPTED',
                'request_managed_by' => 2,
                'request_processed_at' => Carbon::now(),
                'deadline' => Carbon::now()->addDays(7),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {  
            Borrow::create([
                'reader_id' => 1,
                'book_id' => $books[rand(0,9)],
                'status' => 'ACCEPTED',
                'request_managed_by' => 2,
                'request_processed_at' => Carbon::now()->subDays(8),
                'deadline' => Carbon::now()->subDays(1),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {  
            Borrow::create([
                'reader_id' => 1,
                'book_id' => $books[rand(0,9)],
                'status' => 'REJECTED',
                'request_managed_by' => 2,
                'request_processed_at' => Carbon::now(),
                'deadline' => Carbon::now()->addDays(7),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {  
            Borrow::create([
                'reader_id' => 1,
                'book_id' => $books[rand(0,9)],
                'status' => 'RETURNED',
                'request_managed_by' => 2,
                'request_processed_at' => Carbon::now(),
                'deadline' => Carbon::now()->addDays(7),
                'returned_at' => Carbon::now()->addDays(2),
                'return_managed_by' => 2
            ]);
        }

        
    }
}
