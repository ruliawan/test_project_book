<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\BookCategory;

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
        $author = Author::inRandomOrder()->first();
        
        return [
            'title' => $this->faker->sentence(4),
            // 'author' => $this->faker->name,
            // 'author_id' => Author::inRandomOrder()->value('author_id') ?? Author::factory(),
            // 'book_category_id' => BookCategory::inRandomOrder()->value('book_category_id') ?? BookCategory::factory(),
            'author_id' => $author->author_id,
            'book_category_id' => BookCategory::inRandomOrder()->value('book_category_id'),
        ];
    }
}
