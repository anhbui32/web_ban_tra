<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert([
            [
                'id' => 1,
                'user_name' => 'Bùi Tuấn Anh',
                'users_id' => 1,
                'email' => 'anh@gmail.com',
                'phone_number' => '0918765238',
                'address' => 'Đà Nẵng',
                'order_date' => now(),
                'note' => 'Sản phẩm này dùng rất tốt cho sức khỏe',
                'status' => 1,
                'total_money' => 200000,
            ],
        ]);
    }
}
