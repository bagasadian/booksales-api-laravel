<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Author::create([
            'name' => 'Tere Liye',
            'bio' => 'Penulis novel terkenal asal Indonesia.'
        ]);

        Author::create([
            'name' => 'Mark Manson',
            'bio' => 'Penulis buku pengembangan diri asal Amerika.'
        ]);

        Author::create([
            'name' => 'Masashi Kishimoto',
            'bio' => 'Mangaka terkenal pencipta serial Naruto.'
        ]);

        Author::create([
            'name' => 'Stephen King',
            'bio' => 'Penulis cerita horor dan thriller ternama.'
        ]);

        Author::create([
            'name' => 'J.K. Rowling',
            'bio' => 'Penulis seri fantasi Harry Potter.'
        ]);
    }
}
