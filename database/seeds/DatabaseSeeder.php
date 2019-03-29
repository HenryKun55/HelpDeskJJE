<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UserTableSeeder::class,
          BranchLineTableSeeder::class,
          DepartmentsTableSeeder::class,
          OccurrencyTypeTableSeeder::class,
          ClientsTableSeeder::class,
          CategoryTableSeeder::class,
          StatusTableSeeder::class,
          CRTTableSeeder::class
        ]);
    }
}
