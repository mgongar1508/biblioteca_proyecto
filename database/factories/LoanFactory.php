<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $books = Book::all();
        $users = User::all();
        return [
            'fecha_prestamo' => fake()->date(),
            'fecha_devolucion' => fake()->date(),
            'estado' => fake()->randomElement(['Activo', 'Devuelto']),
            'book_id' => $books->random()->id,
            'user_id' => $books->random()->id
        ];
    }
}
