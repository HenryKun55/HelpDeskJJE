<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clients')->insert([
      'name' => str_random(10),
      'fantasy_name' => str_random(10),
			'cpf_cnpj' => str_random(10),
			'address' => str_random(10),
			'district' => str_random(10),
      'email' => str_random(10).'@gmail.com',
      'related_products' => str_random(10),
      'responsible' => str_random(10),
      'zip_code' => str_random(10),
      'number' => str_random(10),
      'complement' => str_random(10),
      'city' => str_random(10),
      'state' => str_random(10),
      'phone' => str_random(10),
      'phone_other' => str_random(10),
      'responsible_department' => str_random(10)
        ]);
    }
}
