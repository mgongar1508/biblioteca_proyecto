<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Storage::deleteDirectory('images/books');
        Storage::createDirectory('images/books');
        User::factory(30)->create();
        Author::factory(5)->create();
        $this->call(CategorySeeder::class);
        Book::factory(30)->create();
        Loan::factory(20)->create();


    }
}
