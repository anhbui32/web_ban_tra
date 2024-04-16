<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Admin-Category List';
        $categories = Category::paginate(5);
        return view('admin.categoryList', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = 'Admin-Category Create';
        return view('admin.categoryCreate', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
        ]);
        Category::create($request->all()); //nếu sử dụng cách này thì cần đảm bảo name='' trong input và trường dữ liệu ở data giống nhau
        // Category::insert([ //cách này thì key trong validate phải là name='' trong input
        //     'type_name' => $request->category_name,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);
        return redirect()->route('category.index')->with('notice', 'Thêm thành công!');
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
    public function edit(Request $request, string $id)
    {
        // $category = \DB::table('category')->find($id);
        $category = Category::find($id);
        $title = 'Admin-Category Edit';
        return view('admin.categoryEdit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'type_name' => 'request',
        // ]);
        Category::find($id)->update($request->all());
        return redirect()->route('category.index')->with('notice', 'Đã cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Category::find($id)->deleteOrFail();
        $categoryId = Category::find($id);
        // return gettype($categoryId->categoryOneToMany);
        if ($categoryId->categoryOneToMany->count() != 0) {
            return redirect()->route('category.index')->with('notice', 'Đã có sản phẩm liên kết với Category này.');
        } else {
            $categoryId->delete();
        }

        // Hiển thị thông báo xóa Category thành công
        return redirect()->route('category.index')->with('notice', 'Xóa Category thành công.');
    }
}
