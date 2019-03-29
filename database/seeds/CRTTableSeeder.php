<?php

use Illuminate\Database\Seeder;

class CRTTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_r_t_s')->insert([
            'codigo' => 1,
            'descricao' => 'Simples Nacional'
          ]);
    
          DB::table('c_r_t_s')->insert([
            'codigo' => 3,
            'descricao' => 'Lucro Real'
          ]);
    
          DB::table('c_r_t_s')->insert([
            'codigo' => 3,
            'descricao' => 'Lucro Presumido'
          ]);
    
          DB::table('c_r_t_s')->insert([
            'codigo' => 1,
            'descricao' => 'MEI - Microempreendedor Individual'
          ]);
    }
}
