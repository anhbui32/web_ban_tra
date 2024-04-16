@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
@section('mainContent')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Shopping Cart</h1>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container">
        <h1 class="mb-4">Shopping Cart</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="product">
                            @foreach ($cart->items as $item)
                                <div class="row mt-5">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/' . $item['image']) }}" alt="Product Image"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="product-name">{{ $item['name'] }}</h4>
                                        <p class="product-description">{{ $item['decription'] }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="d-flex">
                                            <p>Đơn giá: </p>
                                            <p class="product-price ms-3">{{ number_format($item['price']) }}đ</p>
                                        </span>
                                        <span class="d-flex">
                                            <p class="text-decoration-underline text-danger">Thành tiền: </p>
                                            <p class="product-price ms-3 text-primary">
                                                {{ number_format($item['price'] * $item['addTime'], 0) }}đ
                                            </p>
                                        </span>
                                        <div class="input-group">
                                            {{-- <button class="btn btn-outline-secondary" type="button"
                                                    id="button-minus">-</button> --}}
                                            <form action="{{ route('updateCart', $item['id']) }}" method="get"
                                                class="d-flex">
                                                <input type="number" min="1" name="addTime" class="form-control text-center w-50"
                                                    value="{{ $item['addTime'] }}">
                                                <button class="btn btn-primary btn-sm ms-1">Cập nhập</button>
                                            </form>
                                            {{-- <button class="btn btn-outline-secondary" type="button"
                                                    id="button-plus">+</button> --}}
                                        </div>
                                        <a onclick="return confirm('Xóa nhé, đừng hối hận!')"
                                            href="{{ route('delete.cart', $item['id']) }}"
                                            class="btn btn-danger mt-2">Xóa</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add more products here -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Cart Summary</h4>
                        <form>
                            <div class="mb-3">
                                <label for="coupon" class="form-label">Coupon Code</label>
                                <input type="text" class="form-control" id="coupon">
                            </div>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Subtotal:
                                    <span class="badge bg-primary">{{ number_format($cart->totalPrice, 2) }}đ</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Tax:
                                    <span class="badge bg-primary">{{ number_format(0, 2) }}đ</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Discount:
                                    <span class="badge bg-primary">{{ number_format(0, 2) }}đ</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total:
                                    <span class="badge bg-primary">{{ number_format($cart->totalPrice, 2) }}đ</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Apply Coupon</button>
                                <button class="btn btn-primary mt-3">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        /* Custom styles for this page */
        body {
            padding-top: 20px;
        }

        .product {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .product img {
            max-width: 100px;
        }
    </style>
@endsection
{{-- @section('js')
    <script>
        // JavaScript for quantity buttons
        document.getElementById("button-plus").addEventListener("click", function() {
            var quantity = parseInt(document.getElementById("quantity").value);
            document.getElementById("quantity").value = quantity + 1;
        });

        document.getElementById("button-minus").addEventListener("click", function() {
            var quantity = parseInt(document.getElementById("quantity").value);
            if (quantity > 1) {
                document.getElementById("quantity").value = quantity - 1;
            }
        });
    </script>
@endsection --}}
