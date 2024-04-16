<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;
use Database\Seeders\Carbon;


class category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Chuyển đổi ngày tháng từ chuỗi sang timestamp
        // $timestamp = Carbon::parse('16-3-2024')->timestamp;
        DB::table('category')->delete();
        DB::table('category')->insert([
            ['id' => 1, 'created_at' => now(), 'type_name' => 'Trà Xanh'],
            ['id' => 2, 'created_at' => now(), 'type_name' => 'Trà Sen'],
            ['id' => 3, 'created_at' => now(), 'type_name' => 'Trà Thảo Mộc'],
            ['id' => 4, 'created_at' => now(), 'type_name' => 'Trà Bạc Hà'],
            ['id' => 5, 'created_at' => now(), 'type_name' => 'Trà Xâm'],
        ]);
    }
}
