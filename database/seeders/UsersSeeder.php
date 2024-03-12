<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'rol_id' => 1,
            'name' => 'SuperAdmin',
            'usu_nombres' => 'Alex Pachucho',
            'usu_telefono' => '0999999999',
            'email' => 'alexpachucho@gmail.com',
            'password' => bcrypt('1234567890'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 2,
            'name' => 'Carlitos',
            'usu_nombres' => 'Carlos González',
            'usu_telefono' => '0998765432',
            'email' => 'usuario1@gmail.com',
            'password' => bcrypt('5896785420'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 2,
            'name' => 'María',
            'usu_nombres' => 'María Rodríguez',
            'usu_telefono' => '0987654321',
            'email' => 'usuario2@gmail.com',
            'password' => bcrypt('3983073577'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 2,
            'name' => 'Juanito',
            'usu_nombres' => 'Juan Pérez',
            'usu_telefono' => '0976543210',
            'email' => 'usuario3@gmail.com',
            'password' => bcrypt('4530535434'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 3,
            'name' => 'Laurita',
            'usu_nombres' => 'Laura Martínez',
            'usu_telefono' => '0965432109',
            'email' => 'docente1@gmail.com',
            'password' => bcrypt('6873043542'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 3,
            'name' => 'Pedrito',
            'usu_nombres' => 'Pedro Sánchez',
            'usu_telefono' => '0954321098',
            'email' => 'docente2@gmail.com',
            'password' => bcrypt('2453053543'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'Anita',
            'usu_nombres' => 'Ana Gómez',
            'usu_telefono' => '0943210987',
            'email' => 'estudiante1@gmail.com',
            'password' => bcrypt('8767676752'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'Ricardo',
            'usu_nombres' => 'Ricardo Herrera',
            'usu_telefono' => '0932109876',
            'email' => 'estudiante2@gmail.com',
            'password' => bcrypt('2422072872'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'Prueba1',
            'usu_nombres' => 'Prueba1 ',
            'usu_telefono' => '0977778778',
            'email' => 'Prueba1@gmail.com',
            'password' => bcrypt('58587575775'),
        ]);

    }
}
