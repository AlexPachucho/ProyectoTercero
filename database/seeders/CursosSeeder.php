<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos ficticios pero realistas para los cursos
        DB::table('cursos')->insert([
            'cur_titulo' => 'Programación Web',
            'cur_descripcion' => 'Curso avanzado de desarrollo web',
            'cur_grupo' => 'Programación',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Inglés Intermedio',
            'cur_descripcion' => 'Clases de inglés para nivel intermedio',
            'cur_grupo' => 'Idiomas',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Matemáticas Aplicadas',
            'cur_descripcion' => 'Conceptos avanzados de matemáticas aplicadas',
            'cur_grupo' => 'Matemáticas',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Marketing Digital',
            'cur_descripcion' => 'Estrategias y técnicas de marketing en línea',
            'cur_grupo' => 'Marketing',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Introducción a la Inteligencia Artificial',
            'cur_descripcion' => 'Conceptos básicos de IA',
            'cur_grupo' => 'Inteligencia Artificial',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Diseño Gráfico Avanzado',
            'cur_descripcion' => 'Técnicas avanzadas de diseño gráfico',
            'cur_grupo' => 'Diseño Gráfico',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Historia del Arte',
            'cur_descripcion' => 'Exploración de la historia del arte',
            'cur_grupo' => 'Arte',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Programación en Python',
            'cur_descripcion' => 'Curso introductorio a la programación en Python',
            'cur_grupo' => 'Programación',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Psicología Social',
            'cur_descripcion' => 'Estudio de la psicología social y comportamiento humano',
            'cur_grupo' => 'Psicología',
        ]);

        DB::table('cursos')->insert([
            'cur_titulo' => 'Economía para Principiantes',
            'cur_descripcion' => 'Introducción a los principios económicos',
            'cur_grupo' => 'Economía',
        ]);
    }
}
