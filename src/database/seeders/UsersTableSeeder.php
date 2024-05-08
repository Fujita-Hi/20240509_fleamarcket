<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'uuid' => Str::uuid(),
            'name' => 'user1',
            'email' => 'user@mail',
            'password' => Hash::make('12345678'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'uuid' => Str::uuid(),
            'name' => 'owner1',
            'email' => 'owner@mail',
            'password' => Hash::make('12345678'),
            'role' => '1'
        ];
        DB::table('users')->insert($param);

        $param = [
            'uuid' => Str::uuid(),
            'name' => 'admin1',
            'email' => 'admin@mail',
            'password' => Hash::make('12345678'),
            'role' => '11'
        ];
        DB::table('users')->insert($param);

    }
}
