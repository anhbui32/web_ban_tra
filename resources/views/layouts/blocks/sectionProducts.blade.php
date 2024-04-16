<div class="container">
    <div class="row align-items mt-5">
        @foreach ($productInF as $key => $valu)
            <div class="col-4">
                <a href="{{ route('detailProduct', ['id' => $valu->id, 'productName' => Str::slug($valu->title)]) }}"
                    class="product-item rounded">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('uploads/' . $valu->thumbnail) }}" alt="" width="410" height="300"
                            height="200">
                    </div>
                </a>
                <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                    <h4 class="text-primary">{{ $valu->title }}</h4>
                    <div class="d-flex flex-row justify-content-around align-items-center">
                        <p class="text-decoration-underline" style="color: red">Giá: {{ $valu->price }}
                            <span style="font-size: smaller;">VNĐ</span>
                        </p>
                        <a href="{{ route('add.cart', $valu->id) }}" class="btn btn-success">Mua</a>
                    </div>
                    <span style="font-size: small; word-wrap: break-word">{{ $valu->description }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="mt-5">
    {{ $productInF->links() }}
</div>
