<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'id' => 1,
            'name' => 'Cédula de Ciudadanía',
            'code' => 'CC',
        ]);

        DB::table('document_types')->insert([
            'id' => 2,
            'name' => 'Cedula de Extranjería',
            'code' => 'CE',
        ]);

        DB::table('document_types')->insert([
            'id' => 3,
            'name' => 'Pasaporte',
            'code' => 'P',
        ]);

        DB::table('document_types')->insert([
            'id' => 4,
            'name' => 'Permiso Especial',
            'code' => 'PE',
        ]);

    }
}
