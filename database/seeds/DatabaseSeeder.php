<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
    	$this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        //Model::reguard();
    }
}
