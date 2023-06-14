<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=24;$i++){
            Comentario::create(['id_usuario'=>2, "id_producto"=>$i, "contenido"=>"Excelente calidad."]);
        }
    }
}
