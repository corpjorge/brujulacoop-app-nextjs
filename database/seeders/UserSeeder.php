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
            'go' => 1,
            'locked' => '',
            'new' => '',
            'password' => '$2y$10$3USVgkHnsRAWzt5aYuxq3eREYWiULAIdSjFHWVA0KK..3b1eGWJ2a',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Luis Alberto Ruiz Sarmiento',
            'email' => 'alberto@evolucionamos.com',
            'document' => '123123',
            'go' => 1,
            'locked' => '',
            'new' => '',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
