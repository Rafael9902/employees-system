<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'id' => 1,
            'name' => 'Administración',
        ]);

        DB::table('areas')->insert([
            'id' => 2,
            'name' => 'Financiera',
        ]);

        DB::table('areas')->insert([
            'id' => 3,
            'name' => 'Compras',
        ]);

        DB::table('areas')->insert([
            'id' => 4,
            'name' => 'Infraestructura',
        ]);

        DB::table('areas')->insert([
            'id' => 5,
            'name' => 'Operación',
        ]);

        DB::table('areas')->insert([
            'id' => 6,
            'name' => 'Talento Humano',
        ]);

        DB::table('areas')->insert([
            'id' => 7,
            'name' => 'Servicios Varios',
        ]);

        DB::table('areas')->insert([
            'id' => 8,
            'name' => 'Desarrollo',
        ]);
    }
}
