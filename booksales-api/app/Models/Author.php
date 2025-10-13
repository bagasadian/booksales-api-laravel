<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Tere Liye',
            'bio' => 'Penulis asal Indonesia dengan karya populer seperti "Pulang" dan "Pergi".'
        ],
        [
            'id' => 2,
            'name' => 'Andrea Hirata',
            'bio' => 'Dikenal lewat novel "Laskar Pelangi" yang sangat inspiratif.'
        ],
        [
            'id' => 3,
            'name' => 'Dee Lestari',
            'bio' => 'Penulis dan musisi Indonesia, pencipta serial "Supernova".'
        ],
        [
            'id' => 4,
            'name' => 'Habiburrahman El Shirazy',
            'bio' => 'Penulis novel religi populer seperti "Ayat-Ayat Cinta".'
        ],
        [
            'id' => 5,
            'name' => 'Raditya Dika',
            'bio' => 'Penulis komedi dan konten kreator dengan gaya humor khas.'
        ],
    ];

    public function getAuthors(){
        return $this->authors;
    }
}
