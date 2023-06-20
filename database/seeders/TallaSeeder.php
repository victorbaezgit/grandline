<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Talla;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for($i=1;$i<=24;$i++){
            Talla::create(['id_producto'=>$i, "tipo_talla"=>"S", "stock"=>15]);
            Talla::create(['id_producto'=>$i, "tipo_talla"=>"L", "stock"=>15]);
            Talla::create(['id_producto'=>$i, "tipo_talla"=>"XL", "stock"=>2]);
        }
    }
}
