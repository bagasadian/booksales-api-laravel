<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
            'price' => 40000,
            'stock' => 50,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ]);

        Book::create([
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'description' => 'Buku yang membahas filosofi hidup modern.',
            'price' => 25000,
            'stock' => 10,
            'cover_photo' => 'bodo_amat.jpg',
            'genre_id' => 2,
            'author_id' => 2
        ]);

        Book::create([
            'title' => 'Naruto',
            'description' => 'Kisah ninja muda yang bercita-cita menjadi Hokage.',
            'price' => 30000,
            'stock' => 20,
            'cover_photo' => 'naruto.jpg',
            'genre_id' => 1,
            'author_id' => 3
        ]);

        Book::create([
            'title' => 'IT',
            'description' => 'Kisah sekelompok anak melawan makhluk menyeramkan di kota kecil.',
            'price' => 45000,
            'stock' => 12,
            'cover_photo' => 'it.jpg',
            'genre_id' => 4,
            'author_id' => 4
        ]);

        Book::create([
            'title' => 'Harry Potter and the Sorcerer’s Stone',
            'description' => 'Petualangan pertama Harry Potter di dunia sihir.',
            'price' => 50000,
            'stock' => 25,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 3,
            'author_id' => 5
        ]);
    }
}
