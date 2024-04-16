<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function getCategoryApi()
    {
        $cats = Category::orderBy('id', 'asc')->get();
        // return $cats;
        // return response()->json($cats);
        $productsInOneTypeOfCategory = CategoryResource::Collection($cats);
        return response([
            'Category' => $productsInOneTypeOfCategory,
            'status_code' => 200,
            'message' => 'Ok',
        ]);
    }
    public function getCategoryApiData()
    {
        $title = 'Page Xuất dữ liệu';
        return view('xuatDuLieuAPI', compact('title'));
    }
}
