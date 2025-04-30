<?php

use App\User;
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
        User::create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => bcrypt('admin'),
            'level' => 'ADMIN'
        ]);
    }
}
