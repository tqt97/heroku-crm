<?php

namespace Database\Seeders;

use App\Models\ChecklistGroup;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(PageSeeder::class);
        ChecklistGroup::factory(2)->create();
        ChecklistGroup::factory(2)->create();
    }
}
