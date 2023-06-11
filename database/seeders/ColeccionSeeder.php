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
        $camisetas=Coleccione::create(['nombre_coleccion'=>'Camisetas','imagen_coleccion'=>'img/colCamisetas.jpg']);
        $vaqueros=Coleccione::create(['nombre_coleccion'=>'Vaqueros','imagen_coleccion'=>'img/colVaqueros.jpg']);
        $sudaderas=Coleccione::create(['nombre_coleccion'=>'Sudaderas','imagen_coleccion'=>'img/colSudaderas.jpg']);
        $camisas=Coleccione::create(['nombre_coleccion'=>'Camisas','imagen_coleccion'=>'img/colCamisas.jpg']);
        $gorras=Coleccione::create(['nombre_coleccion'=>'Gorras','imagen_coleccion'=>'img/colGorras.jpg']);
        $accesorios=Coleccione::create(['nombre_coleccion'=>'Accesorios','imagen_coleccion'=>'img/colAccesorios.jpg']);
    }
}
