<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Cristian Alves Silva';
        $user->email = 'cristian@gmail.com';
        $user->password = bcrypt('calangos');
        $user->save();
    }
}
