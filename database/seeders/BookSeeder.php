<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'publication_year' => 1960,
                'description' => 'A novel about the serious issues of rape and racial inequality.',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'publication_year' => 1949,
                'description' => 'A dystopian novel set in a totalitarian society.',
            ],
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'publication_year' => 1925,
                'description' => 'A story of the wealthy Jay Gatsby and his love for Daisy Buchanan.',
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'publication_year' => 1813,
                'description' => 'A romantic novel that also critiques the British landed gentry.',
            ],
            [
                'title' => 'Moby-Dick',
                'author' => 'Herman Melville',
                'publication_year' => 1851,
                'description' => 'The saga of Captain Ahab and his obsessive quest for the white whale.',
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'publication_year' => 1951,
                'description' => 'A novel about teenage rebellion and angst.',
            ],
            [
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'publication_year' => 1932,
                'description' => 'A futuristic society driven by technology and control.',
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'publication_year' => 1937,
                'description' => 'A fantasy adventure before the events of The Lord of the Rings.',
            ],
            [
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'publication_year' => 1953,
                'description' => 'A dystopia where books are outlawed and burned.',
            ],
            [
                'title' => 'The Alchemist',
                'author' => 'Paulo Coelho',
                'publication_year' => 1988,
                'description' => 'A philosophical novel about following your dreams.',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

