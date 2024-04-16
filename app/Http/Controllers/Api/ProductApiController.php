<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Http\Resources\ProductsResource;

class ProductApiController extends Controller
{
    protected $data;
    public function __construct(request $request)
    {
        // $getUsers = new Products();
        $this->data = new Products();
    }
    public function getProductApi()
    {
        $products = Products::all();
        return response([
            'Product-data-at-home' => ProductsResource::Collection($products),
            'status_code' => 200,
            'message' => 'Ok',
        ]);
    }
    public function getDetailProducApi($id = null)
    {
        $catProduct = Category::find($id);
        if ($catProduct) {
            return response()->json([
                'data' => $catProduct,
                'status_code' => 200,
                'message' => 'Ok',
            ]);
        }
        return response()->json([
            'data' => null,
            'status_code' => 404,
            'message' => 'Not Found',
        ]);
        // $catProduct = Products::orderBy('created_at')->get();
        // return response([
        //     'data' => $catProduct,
        //     'status_code' => 200,
        //     'message' => 'Ok',
        // ]);
    }
    public function getProductById($id = null, $title = null)
    {
        $category = Category::all();
        $productInF = $this->data->getAllProducts();
        $detailPro = $this->data->getProductById($id);
        $category_id = $detailPro->category_id;
        $productInCategory = Products::where('category_id', $category_id)->get();
        // dd($productInCategory);
        $title = 'Product Detail';
        return view('clients.productDetail', compact('title', 'detailPro', 'category', 'productInF', 'productInCategory'));
    }
}
