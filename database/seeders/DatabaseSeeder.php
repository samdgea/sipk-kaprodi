<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Jetstream\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
