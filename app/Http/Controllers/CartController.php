<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Products $product, Cart $cart)
    {
        $cart->add($product);
        // session()->forget('cart');
        return redirect()->back();
    }
    public function shoppingCart(Cart $cart)
    {
        // dd($cart);
        $category = Category::all();
        if (Auth::check()) {
            $title = 'Shopping Cart';
            return view('clients.shoppingCart', compact('title', 'cart', 'category'));
        };
        $alert = '!Hãy đăng nhập để mua đồ';
        return redirect()->back()->with('alert', $alert);
    }
    public function deleteCart($id, Cart $cart)
    {
        $cart->delete($id);
        return redirect()->back();
    }
    public function updateCart($id, Cart $cart)
    {
        $quantity = request('addTime', 1);
        $cart->update($id, $quantity);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
