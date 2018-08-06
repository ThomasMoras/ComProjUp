<?php

use Illuminate\Database\Seeder;

class ContratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contrats')->insert([
            'nom' => 'CDI'
        ]);
    }
}
