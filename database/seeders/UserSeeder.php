<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tuquoctuan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'website' => 'https://tuquoctuan.com',
        ]);
        User::create([
            'name' => 'Chang Do',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'website' => 'https://user.com',
        ]);
    }
}
