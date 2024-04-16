<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'id' => 1,
                'role_id' => 1,
                'user_name' => 'Bùi Tuấn Anh',
                'email' => 'anh@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make("bimatnho"),
                'address' => 'Khu 8, thị trấn Thanh Hà, Huyện Thanh Hà, tỉnh Hải Dương',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'phone_number' => '0346373761',
                'deleted' => 0,
            ],
            [
                'id' => 2,
                'role_id' => 0,
                'user_name' => 'Thùy Linh',
                'email' => 'linh@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make("bimatnho"),
                'address' => 'thị trấn Thanh Hà, Huyện Thanh Hà, tỉnh Hải Dương',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'phone_number' => '0987456012',
                'deleted' => 0,
            ],
        ]);
    }
}
