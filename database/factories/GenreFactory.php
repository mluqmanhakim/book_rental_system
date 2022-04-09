<?php

namespace Database\Factories;
use App\Models\Genre;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition()
    {
        $styles = array("primary", "secondary", "success", "danger", "warning", "info", "light", "dark");
        return [
            'name' => $this->faker->numerify('Genre ##'),
            'style' => $styles[rand(0, 7)]
        ];
    }
}
