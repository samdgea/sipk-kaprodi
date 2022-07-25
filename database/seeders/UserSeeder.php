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
        $userSU = User::create([
            'first_name' => 'Abdilah',
            'last_name' => 'Sammi',
            'email' => 'hello@abdilah.id',
            'password' => \Hash::make('password'),
            'account_status' => 1
        ]);

        $userSU->assignRole('Super User');
    }
}
