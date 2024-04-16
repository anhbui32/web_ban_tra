<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->totalPrice();
        $this->totalQuantity = $this->totalQuantity();
    }
    public function add($product)
    {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['addTime'] += 1;
        } else {
            $cart_item = [
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'decription' => $product->description,
                'image' => $product->thumbnail,
                'addTime' => 1,
                'quantity' => $product->quantity,
            ];
            $this->items[$product->id] = $cart_item;
        }
        session(['cart' => $this->items]);
    }
    public function update($id, $qtt)
    {
        if (isset($this->items[$id])) {
            // dd($this->items[$id]);
            $this->items[$id]['addTime'] = $qtt;
            session(['cart' => $this->items]);
            // dd($this->items[$id]['addTime']);
        }
    }
    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }
    private function totalPrice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['addTime'];
        }
        return $total;
    }
    private function totalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['addTime'];
        }
        return $total;
    }
}
