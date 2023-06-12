<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Producto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //CREACION DE ROLES
        $this->call(PermissionSeeder::class);

        //USUARIO ADMIN
        $admin=User::create(['name'=>'vic','surname'=>'el milhor','email'=>'elmilhor@gmail.com','direccion'=>'adivinas','codigoPostal'=>'41720','localidad'=>'ma city','pais'=>'Espoño','telefono'=>'11111111sexo','password'=>Hash::make("jejejeje")]);
        $admin->assignRole('admin');


        //COLECCION SEEDER
        $this->call(ColeccionSeeder::class);
  
        
    }
}
