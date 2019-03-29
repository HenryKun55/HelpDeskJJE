<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('statuses')->insert([
        'name' => 'Pesquisando Solução'
      ]);

      DB::table('statuses')->insert([
        'name' => 'Pendente'
      ]);

      DB::table('statuses')->insert([
        'name' => 'Usuário Ausente/Retornar'
      ]);

      DB::table('statuses')->insert([
        'name' => 'Cancelado'
      ]);

      DB::table('statuses')->insert([
        'name' => 'Resolvido'
      ]);
    }
}
