<?php

namespace Database\Seeders;

use App\Models\Manger;
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
        Manger::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
