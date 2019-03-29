<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departments')->insert([
        'name' => 'Administrador'
      ]);

      DB::table('departments')->insert([
        'name' => 'Desenvolvimento'
      ]);

      DB::table('departments')->insert([
        'name' => 'Suporte'
      ]);

      DB::table('departments')->insert([
        'name' => 'Comercial'
      ]);
    }
}
