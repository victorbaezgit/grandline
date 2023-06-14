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
        $admin=User::create(['name'=>'vic','surname'=>'administrador','email'=>'admin@gmail.com','direccion'=>'Calle Admin 6','codigoPostal'=>'41700','localidad'=>'Unknown','pais'=>'Unknown','telefono'=>'655332233','password'=>Hash::make("Admin_1")]);
        $admin->assignRole('admin');
        $admin=User::create(['name'=>'user','surname'=>'usuario','email'=>'user@gmail.com','direccion'=>'Calle User 4','codigoPostal'=>'41700','localidad'=>'Unknown','pais'=>'Unknown','telefono'=>'755443322','password'=>Hash::make("User_1")]);
        $admin->assignRole('user');

        //COLECCION SEEDER
        $this->call(ColeccionSeeder::class);
  
        //PRODUCTO SEEDER
        $this->call(ProductoSeeder::class);

        //TALLA SEEDER
        $this->call(TallaSeeder::class);

    }
}
