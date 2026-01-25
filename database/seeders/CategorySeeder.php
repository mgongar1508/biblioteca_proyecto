<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fiction' => 'Narrative literary works created from imagination, including novels and short stories.',
            'Science' => 'Books that explore scientific principles, discoveries, and research across various fields.',
            'History' => 'Works that document and analyze past events, civilizations, and historical figures.',
            'Technology' => 'Publications focused on computing, engineering, programming, and technological innovation.',
            'Philosophy' => 'Texts that examine fundamental questions about existence, knowledge, ethics, and logic.',
        ];

        foreach($categories as $nombre=>$descripcion){
            Category::create(compact('nombre', 'descripcion'));
        }
    }
}
