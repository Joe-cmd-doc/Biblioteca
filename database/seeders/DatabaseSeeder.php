<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       // User::factory()->create([
       //     'name' => 'Test User',
      //      'email' => 'test@example.com',
        //]);
         // Crear un usuario administrador
         User::create([
            'name' => 'Joel', // Cambia esto por tu nombre
            'email' => 'joelortizrivas@gmail.com', // Cambia esto por tu correo
            'password' => 'aa1234aa', // Cambia esto por tu contraseña
            'is_admin' => true,
        ]);
    }
}
