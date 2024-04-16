<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order_detail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_detail')->delete();
        DB::table('order_detail')->insert([
            ['id' => 1, 'price' => 55000, 'num' => 2, 'total_money' => 110000, 'products_id' => 16, 'orders_id' => 1],
        ]);
    }
}
