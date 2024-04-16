<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            ['id' => 1, 'title' => 'Trà Xanh đặc sản Mộc Châu', 'price' => 59000, 'discount' => 1, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 1],
            ['id' => 2, 'title' => 'Trà Xanh đặc sản Huế', 'price' => 59000, 'discount' => 3, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 1],
            ['id' => 3, 'title' => 'Trà Xanh đặc sản Đà Nẵng', 'price' => 59000, 'discount' => 2, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 1],
            ['id' => 4, 'title' => 'Trà Xanh đặc sản Đà Lạt', 'price' => 59000, 'discount' => 5, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 1],
            ['id' => 5, 'title' => 'Trà Xanh đặc sản Châu Đốc', 'price' => 59000, 'discount' => 4, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 1],
            ['id' => 6, 'title' => 'Trà Sen hương vị Thái Bình', 'price' => 65000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 2],
            ['id' => 7, 'title' => 'Trà Sen hương vị Hà Nội', 'price' => 65000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 2],
            ['id' => 8, 'title' => 'Trà Sen hương vị đồng quê', 'price' => 65000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 2],
            ['id' => 9, 'title' => 'Trà Sen hương vị Đà Lạt', 'price' => 65000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 2],
            ['id' => 10, 'title' => 'Trà Sen hương vị Châu Đốc', 'price' => 65000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 2],
            ['id' => 11, 'title' => 'Trà Thảo Mộc hương vị Thái Bình', 'price' => 70000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 3],
            ['id' => 12, 'title' => 'Trà Thảo Mộc hương vị Hà Nội', 'price' => 70000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 3],
            ['id' => 13, 'title' => 'Trà Thảo Mộc hương vị Cao Bằng', 'price' => 70000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 3],
            ['id' => 14, 'title' => 'Trà Thảo Mộc hương vị Đà Lạt', 'price' => 70000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 3],
            ['id' => 15, 'title' => 'Trà Thảo Mộc hương vị Châu Đốc', 'price' => 70000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 3],
            ['id' => 16, 'title' => 'Trà Bạc Hà hương vị Thái Bình', 'price' => 55000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 4],
            ['id' => 17, 'title' => 'Trà Bạc Hà hương vị Hà Nội', 'price' => 55000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 4],
            ['id' => 18, 'title' => 'Trà Bạc Hà hương vị Cao Đài', 'price' => 55000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 4],
            ['id' => 19, 'title' => 'Trà Bạc Hà hương vị Đà Lạt', 'price' => 55000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 4],
            ['id' => 20, 'title' => 'Trà Bạc Hà hương vị Châu Đốc', 'price' => 55000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 4],
            ['id' => 21, 'title' => 'Trà Xâm hương vị Châu Đốc', 'price' => 62000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 5],
            ['id' => 22, 'title' => 'Trà Xâm hương vị Hà Nội', 'price' => 62000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 5],
            ['id' => 23, 'title' => 'Trà Xâm hương vị Thái Bình', 'price' => 62000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 5],
            ['id' => 24, 'title' => 'Trà Xâm hương vị Cao Bằng', 'price' => 62000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 5],
            ['id' => 25, 'title' => 'Trà Xâm hương vị Đà Lạt', 'price' => 62000, 'discount' => 0, 'thumbnail' => '', 'thumbnail_a' => '', 'thumbnail_b' => '', 'thumbnail_c' => '', 'thumbnail_d' => '', 'description' => '', 'created_at' => now(), 'category_id' => 5],
        ]);
    }
}
