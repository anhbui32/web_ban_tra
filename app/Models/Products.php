<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    // protected $guarded = ['description']; // cú pháp này để loại bỏ trường descripton description khi thao tác với dữ liệu trên products
    protected $table = 'products';
    protected $fillable = [
        'id',
        'title',
        'price',
        'description',
        'thumbnail',
        'thumbnail_a',
        'thumbnail_b',
        'thumbnail_c',
        'thumbnail_d',
        'discount',
        'quantity',
        'update_at',
        'create_at',
        'category_id'
    ];
    public function getAllProducts()
    {
        return DB::table('products')->get();
    }
    public function getAllCategory()
    {
        return DB::table('category')->get();
    }
    public function getProductsCategory($id)
    {
        return DB::table('products')->where('category_id', $id);
        // return DB::table('category')
        //     ->join('products', 'category.id', 'products.category_id')
        //     ->where('products.category_id', $id)
        //     ->select('category.type_name', 'products.*')->get();
    }
    public function getCharacters($characters)
    {
        return Products::where('title', 'like', '%' . $characters . '%');
    }
    public function getProductById($id)
    {
        return DB::table('products')->where('id', $id)->first();
    }
    public function productsOneToOne()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // public function getProductsAndCategorys()
    // {
    //     return DB::table('products')
    //         ->join('category', 'products.category_id', 'category.id')
    //         ->select('products.*', 'category.*');
    // }
}
