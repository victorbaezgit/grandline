<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coleccione;

class ColeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coleccione::create(['nombre_coleccion'=>'One Piece','imagen_coleccion'=>'https://res.cloudinary.com/daizvavk0/image/upload/v1686735806/productos/ycbozhohjwvl1lqtlgce.webp']);
        Coleccione::create(['nombre_coleccion'=>'Music','imagen_coleccion'=>'https://res.cloudinary.com/daizvavk0/image/upload/v1686735742/productos/s9rdmzzbtj4yiikhycja.webp']);
        Coleccione::create(['nombre_coleccion'=>'Tupac','imagen_coleccion'=>'https://res.cloudinary.com/daizvavk0/image/upload/v1686736972/productos/wzrv4s5fvzkdzuv4efeh.webp']);
        Coleccione::create(['nombre_coleccion'=>'Artistic','imagen_coleccion'=>'https://res.cloudinary.com/daizvavk0/image/upload/v1686735837/productos/ll5mit7fwukrl5idvwny.webp']);
        Coleccione::create(['nombre_coleccion'=>'Rocky','imagen_coleccion'=>'https://res.cloudinary.com/daizvavk0/image/upload/v1686735816/productos/lmsjihnnryr5k5jhkmsp.webp']);
        Coleccione::create(['nombre_coleccion'=>'Naruto','imagen_coleccion'=>'https://res.cloudinary.com/daizvavk0/image/upload/v1686735798/productos/ziihpep3thnz8luftmgx.webp']);
    }
}
