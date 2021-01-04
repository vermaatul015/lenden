<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::truncate();

        User::create(['name'=>'Admin','email' => 'admin@yopmail.com','password'=>bcrypt('12345678')]);
    }

}