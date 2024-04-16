<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class ClientProductController extends Controller
{
    protected $data;
    public function __construct(request $request)
    {
        $this->data = new Products();
    }
    public function showProductsPage()
    {
        $productInF = Products::paginate(6);
        $title = 'My Product';
        return view('clients.products', compact(
            'productInF',
            'title',
        ));
    }
    public function getProductById($id = null, $title = null)
    {
        $productInF = $this->data->getAllProducts();
        $detailPro = $this->data->getProductById($id);
        $category_id = $detailPro->category_id;
        $productInCategory = Products::where('category_id', $category_id)->get();
        $title = 'Product Detail';
        return view('clients.productDetail', compact(
            'title',
            'detailPro',
            'productInF',
            'productInCategory'
        ));
    }
    public function getProductsCategory($idbs = null)
    {
        $category = Category::all();
        $title = 'Category Products';
        // $productInF = Products::where('category_id', $idbs)->paginate(3);
        $productInF = $this->data->getProductsCategory($idbs)->paginate(3);
        return view('clients.categoryProductsPage', compact(
            'productInF',
            'title',
        ));
    }
    public function findProduct(Request $request)
    {
        $title = 'Sản Phẩm';
        $productInF = $this->data->getCharacters($request->input('findProduct'))->paginate(6);
        return view('clients.categoryProductsPage', compact(
            'title',
            'productInF',
        ));
    }
}
