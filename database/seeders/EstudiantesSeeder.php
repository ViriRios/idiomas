<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Estudiante::factory(10)->create();
    }
}
