<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Bilions\FakerImages\FakerImageProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        fake()->addProvider(new FakerImageProvider(fake()));
        $image = fake()->image(sys_get_temp_dir(), 640, 480);
        $categories = Category::all();
        $authors = Author::all();
        return [
            'titulo' => fake()->unique()->realText(30),
            'publicado_ano' => fake()->year(2026),
            'editorial' => fake()->randomElement(['Editorial1', 'Editorial2', 'Editorial3', 'Editorial4',]),
            'portada' => Storage::putFileAs('imagenes/books', new File($image), basename($image)),
            'category_id' => $categories->random()->id,
            'author_id' => $authors->random()->id
        ];
    }
}
