<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
// use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('productsOneToOne')->paginate(5); //lấy tất cả các trường của 2 bảng Category và Products
        // dd($products);
        // $products = Category::with('categoryOneToMany')->join('products', 'category.id', 'products.category_id')->paginate(5);
        $title = 'Admin-Products List';
        return view('admin.productList', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryType = Category::all();
        // dd($categoryType);
        $title = 'Admin-Products Create';
        return view('admin.productCreate', compact('title', 'categoryType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        // Products::create($request->all());
        $destinationPath = "uploads";
        if ($request->has('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail->move($destinationPath, $thumbnail->getClientOriginalName());
            $request->merge(['hinhanh' => $thumbnail->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_a')) {
            $thumbnail_a = $request->file('thumbnail_a');
            $thumbnail_a->move($destinationPath, $thumbnail_a->getClientOriginalName());
            $request->merge(['hinhanh_a' => $thumbnail_a->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_b')) {
            $thumbnail_b = $request->file('thumbnail_b');
            $thumbnail_b->move($destinationPath, $thumbnail_b->getClientOriginalName());
            $request->merge(['hinhanh_b' => $thumbnail_b->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_c')) {
            $thumbnail_c = $request->file('thumbnail_c');
            $thumbnail_c->move($destinationPath, $thumbnail_c->getClientOriginalName());
            $request->merge(['hinhanh_c' => $thumbnail_c->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_d')) {
            $thumbnail_d = $request->file('thumbnail_d');
            $thumbnail_d->move($destinationPath, $thumbnail_d->getClientOriginalName());
            $request->merge(['hinhanh_d' => $thumbnail_d->getClientOriginalName()]);
        };

        Products::insert([
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'created_at' => now(),
            'thumbnail' => $request->hinhanh,
            'thumbnail_a' => $request->hinhanh_a,
            'thumbnail_b' => $request->hinhanh_b,
            'thumbnail_c' => $request->hinhanh_c,
            'thumbnail_d' => $request->hinhanh_d,
        ]);
        return redirect()->route('products.index')->with('notice', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Admin-Products Edit';
        $productId = Products::with('productsOneToOne')->find($id);
        // dd($productId);
        $categoryType = Category::all();
        return view('admin.productEdit', compact('title', 'categoryType', 'productId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $products = Products::find($id);
        $destinationPath = "uploads";
        if ($request->has('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail->move($destinationPath, $thumbnail->getClientOriginalName());
            $request->merge(['hinhanh' => $thumbnail->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_a')) {
            $thumbnail_a = $request->file('thumbnail_a');
            $thumbnail_a->move($destinationPath, $thumbnail_a->getClientOriginalName());
            $request->merge(['hinhanh_a' => $thumbnail_a->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_b')) {
            $thumbnail_b = $request->file('thumbnail_b');
            $thumbnail_b->move($destinationPath, $thumbnail_b->getClientOriginalName());
            $request->merge(['hinhanh_b' => $thumbnail_b->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_c')) {
            $thumbnail_c = $request->file('thumbnail_c');
            $thumbnail_c->move($destinationPath, $thumbnail_c->getClientOriginalName());
            $request->merge(['hinhanh_c' => $thumbnail_c->getClientOriginalName()]);
        };
        if ($request->has('thumbnail_d')) {
            $thumbnail_d = $request->file('thumbnail_d');
            $thumbnail_d->move($destinationPath, $thumbnail_d->getClientOriginalName());
            $request->merge(['hinhanh_d' => $thumbnail_d->getClientOriginalName()]);
        };

        $products->update([
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'updated_at' => now(),
            'thumbnail' => $request->hinhanh,
            'thumbnail_a' => $request->hinhanh_a,
            'thumbnail_b' => $request->hinhanh_b,
            'thumbnail_c' => $request->hinhanh_c,
            'thumbnail_d' => $request->hinhanh_d,
        ]);
        return redirect()->route('products.index')->with('notice', 'Cập nhập thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::find($id);
        Products::destroy($id);
        return redirect()->route('products.index')->with('notice', 'Xóa thành công!');
    }
}
