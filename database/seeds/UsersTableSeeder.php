<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'CDI',
            'prenom'=>'Toto',
            'description'=>'ma super description',
            'departement'=>01,
            'email'=>'aaa@aaaa.aaa',
            'domaine_id'=>0,
            'contrat_id'=>0,
            'password'=>bcrypt('aze123')
        ]);
    }
}
