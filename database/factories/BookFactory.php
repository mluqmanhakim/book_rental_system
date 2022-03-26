<?php

namespace Database\Factories;
use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->numerify('Book ##'),
            'authors' => $this->faker->name(),
            'description' => $this->faker->text(500),
            'released_at' => $this->faker->date(),
            'cover_image' => $this->faker->optional()->imageUrl(),
            'pages' => $this->faker->randomDigit(),
            'isbn' => $this->faker->unique()->bothify('?????########'),
            'in_stock' => $this->faker->randomDigit()
        ];
    }
}
