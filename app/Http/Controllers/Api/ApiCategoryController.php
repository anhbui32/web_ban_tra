<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::paginate(3);
        // dd($category);
        return response([
            'categoryApi' => $category,
            'status_code' => 200,
            'message' => 'Resource was successfully',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'type_name' => 'required',
            // 'created_up' => 'required|date|after:now',
        ]);
        $categoryStore = request()->except('created_up', 'updated_up');
        $categoryStore['created_up'] = date('Y-m-d H:i:s');
        return Category::create($request->all());
        // return new Category($categoryStore);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update(request()->all());
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response([
            'categoryApi' => $category,
            'status_code' => 200,
            'message' => 'Resource was updated successfully',
        ]);
    }
}
