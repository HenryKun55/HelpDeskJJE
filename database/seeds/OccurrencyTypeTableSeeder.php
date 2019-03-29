<?php

use Illuminate\Database\Seeder;

class OccurrencyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('occurrence_types')->insert([
        'name' => 'Requisição de Acesso'
      ]);

      DB::table('occurrence_types')->insert([
        'name' => 'Implantacao de Software'
      ]);

      DB::table('occurrence_types')->insert([
        'name' => 'Atualizacao de Software'
      ]);
    }
}
