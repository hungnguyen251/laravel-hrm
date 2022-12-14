<?php

namespace Database\Seeders;

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
        // \App\Models\Notification::factory(20)->create();
        // \App\Models\Salary::factory(10)->create();
        \App\Models\TimeSheet::factory(10)->create();
    }
}
