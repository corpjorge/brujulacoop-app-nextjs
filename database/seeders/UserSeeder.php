<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Jorge Eduardo Peralta Guzman',
            'email' => 'corpjorge@hotmail.com',
            'document' => '1014205146',
            'locked' => '',
            'new' => '',
            'password' => '$2y$10$3USVgkHnsRAWzt5aYuxq3eREYWiULAIdSjFHWVA0KK..3b1eGWJ2a',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
