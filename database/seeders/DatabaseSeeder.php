<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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

        if (Str::contains(env('APP_ENV'), ['local', 'development']))
        {
            $this->call(TahunAkademikSeeder::class);
            $this->call(FacultyAndStudyProgrammeSeeder::class);
            $this->call(DummyDosenSeeder::class);
            $this->call(DummyMahasiswaSeeder::class);
        }
    }
}
