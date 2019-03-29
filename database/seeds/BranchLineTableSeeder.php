<?php

use Illuminate\Database\Seeder;

class BranchLineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('branch_lines')->insert([
		            'number' => 'Nenhum',
		]);

		DB::table('branch_lines')->insert([
		            'number' => 20,
		]);

		DB::table('branch_lines')->insert([
		            'number' => 22,
		]);

		DB::table('branch_lines')->insert([
		            'number' => 23,
		]);

		DB::table('branch_lines')->insert([
		            'number' => 24,
		]);

		DB::table('branch_lines')->insert([
		            'number' => 25,
		]);
    }
}
