<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiksi',
            'description' => 'Karya yang bersumber dari imajinasi penulis.'
        ],
        [
            'id' => 2,
            'name' => 'Non-Fiksi',
            'description' => 'Buku berdasarkan fakta dan informasi nyata.'
        ],
        [
            'id' => 3,
            'name' => 'Romance',
            'description' => 'Cerita bertema cinta dan hubungan emosional.'
        ],
        [
            'id' => 4,
            'name' => 'Horror',
            'description' => 'Cerita menegangkan dengan unsur ketakutan.'
        ],
        [
            'id' => 5,
            'name' => 'Fantasi',
            'description' => 'Cerita berlatar dunia imajinatif dan ajaib.'
        ],
    ];

    public function getGenres(){
        return $this->genres;
    }
}
