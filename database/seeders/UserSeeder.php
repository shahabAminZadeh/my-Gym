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
        //User
        User::factory()->create([
            'name'=>'aynaz',
            'email'=>'aynaz@gmail.com'

        ]);
        User::factory()->create([
            'name'=>'Sholeh',
            'email'=>'sholeh@gmail.com',
        ]);
        User::factory()->create([
            'name'=>'shahab',
            'email'=>'shahab@gmail.com',
            'role'=>'instructor'
        ]);
        //random users
        User::factory()->count(10)->create();
        User::factory()->count(10)->create([
            'role'=>'instructor'
        ]);
    }
}
