<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'user1',
            'email' => 'user@test',
            'password' => '12345678',
            'role' => ''
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'staff1',
            'email' => 'staff@test',
            'password' => '12345678',
            'role' => 'staff'
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'owner1',
            'email' => 'owner1@test',
            'password' => '12345678',
            'role' => 'owner'
        ];     
        DB::table('users')->insert($param);

        $param = [
            'name' => 'admin1',
            'email' => 'admin1@test',
            'password' => '12345678',
            'role' => 'admin'
        ];     
        DB::table('users')->insert($param);
    }
}
