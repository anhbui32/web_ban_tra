@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
@section('mainContent')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail Product</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <h1 class="mb-4">{{ $detailPro->title }}</h1>
        <div class="row">
            <div class="col-md-6 d-flex">
                <img src="{{ asset('uploads/' . $detailPro->thumbnail) }}" alt="Product Image"
                    style="height: 450px; width: 420px" class="img-fluid product-image">
                <div class="ms-3 d-flex flex-column justify-content-around">
                    <img src="{{ asset('uploads/' . $detailPro->thumbnail_a) }}" alt="Loading..." height="106"
                        class="" width="160">
                    <img src="{{ asset('uploads/' . $detailPro->thumbnail_b) }}" alt="Loading..." height="106"
                        class="mt-2" width="160">
                    <img src="{{ asset('uploads/' . $detailPro->thumbnail_c) }}" alt="Loading..." height="106"
                        class="mt-2" width="160">
                    <img src="{{ asset('uploads/' . $detailPro->thumbnail_d) }}" alt="Loading..." height="106"
                        class="mt-2" width="160">
                </div>
            </div>
            <div class="col-md-6">
                <p class="lead fw-bold">Miêu tả Sản phẩm:</p>
                <p class="product-description">{{ $detailPro->description }}</p>
                <p class="lead fw-bold">Số lượng phù hợp: {{ $detailPro->discount }}</p>
                <div class="buy-now-form">
                    <form action="" method="get">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" value="1" min="1"
                                max="50">
                        </div>
                        <div class="mb-3">
                            <label for="coupon" class="form-label">Coupon Code:</label>
                            <input type="text" class="form-control" id="coupon">
                        </div>
                        <a href="{{ route('add.cart', $detailPro->id) }}" class="btn btn-primary">Mua Ngay</a>
                    </form>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <h3>Customer Reviews</h3>
                <textarea name="" cols="152" id="" rows="10"></textarea>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <h3>Related Products</h3>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-between">
                                @foreach ($productInCategory as $value)
                                    <div class="card" style="width: 18rem;" id="product-id">
                                        <a
                                            href="{{ route('detailProduct', ['id' => $value->id, 'productName' => Str::slug($value->title)]) }}">
                                            <img style="height: 200px" src="{{ asset('uploads/' . $value->thumbnail) }}"
                                                class="card-img-top" alt="Loát đinh">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $value->title }}</h5>
                                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">Xem
                                                thêm
                                            </a>
                                            <div class="collapse" id="collapseExample">
                                                <p class="card-text card card-body">{{ $value->description }}</p>
                                                <a href="{{ route('detailProduct', ['id' => $value->id, 'productName' => Str::slug($value->title)]) }}"
                                                    class="btn btn-primary">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('css')
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }

        .product-image {
            max-width: 100%;
        }

        .product-description {
            margin-top: 20px;
        }

        .buy-now-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .buy-now-form input[type="submit"] {
            width: 100%;
        }

        .carousel-item img {
            max-width: 100%;
        }
    </style>
@endsection
{{-- @section('js')
    <script>
        $.get('http://127.0.0.1:8000/api/getProductById/{id?}-{productName?}', function(res) {
            console.log(res);
            let cats = res.data;
            let _li = '';
            let url = '{{ route('detailProduct') }}' + '/';
            cats.forEach(function(item) {
                _li += '<a href="' + url + item.id + '" class="list-group-item">' + item.type_name +
                    '</a>';
                console.log(item);
            })
            $('#product-id').html(_li);
        })
    </script>
@endsection --}}
