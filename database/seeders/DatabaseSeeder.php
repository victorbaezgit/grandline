<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Producto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $userPrueba=User::create(['name'=>'vic','surname'=>'el milhor','email'=>'elmilhor@gmail.com','direccion'=>'adivinas','codigoPostal'=>'41720','localidad'=>'ma city','pais'=>'Espoño','telefono'=>'11111111sexo','password'=>Hash::make("jejejeje")]);
        $this->call(ColeccionSeeder::class);
    }
}
