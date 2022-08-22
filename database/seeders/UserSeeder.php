<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Nathaniel Concha',
            'email' => 'nathaniel@admin.com',
            'password' => 'nathaniel@1234',
            'role' => 'Administrator'
        ]);
    }
}
