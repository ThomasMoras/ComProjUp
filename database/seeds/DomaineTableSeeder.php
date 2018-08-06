<?php

use Illuminate\Database\Seeder;

class DomaineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domaines')->insert([
            'nom' => 'Informatique'
        ]);
    }
}
