<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'name' => 'CoffCode'
      ]);

      DB::table('categories')->insert([
        'name' => 'TEF'
      ]);

      DB::table('categories')->insert([
        'name' => 'Sistema Control'
      ]);
    }
}
