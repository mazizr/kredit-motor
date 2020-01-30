<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Aziz',
            'email' => 'aziz@gmail.com',
            'password' => bcrypt('rahasia')
        ]);

    }
}
