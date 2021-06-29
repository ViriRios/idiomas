<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EscolaridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolaridad')->insert([ 'clave' => 'PREPA', 'escolaridad' => 'PREPARATORIA', ]);
        DB::table('escolaridad')->insert([ 'clave' => 'UNI', 'escolaridad' => 'UNIVERSIDAD', ]);
    }
}
