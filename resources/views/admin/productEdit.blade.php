@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('admin.mainSection')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="">
                <div class="bg-secondary rounded p-4">
                    <h4 class="mb-4">User Form</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <form action="{{ route('products.update', $productId->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                            <div style="width: 340px">
                                <div class="mb-3">
                                    <label class="form-label">ID Product</label>
                                    <input class="form-control w-25" value="{{ $productId->id }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $productId->title }}">
                                    @error('title')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control"
                                        value="{{ $productId->price }}">
                                    @error('price')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control"
                                        value="{{ $productId->quantity }}">
                                    @error('quantity')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="checkMe" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div>
                            <div style="width: 340px">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <div class="d-flex align-items-end">
                                        <img src="{{ asset('uploads/' . $productId->thumbnail) }}"
                                            style="width: 100px; height: 80px" alt="Chưa có hình">
                                        <input type="file" name="thumbnail" class="form-control"
                                            value="{{ old('thumbnail') }}" accept="image/*">
                                    </div>
                                    @error('thumbnail')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Discount</label>
                                    <input type="number" name="discount" class="form-control"
                                        value="{{ $productId->discount }}" accept="image/*">
                                    @error('discount')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Type</label>
                                    <div class="d-flex flex-col">
                                        <input type="text" value="{{ $productId->productsOneToOne->type_name }}" class="form-control">
                                        <select name="category_id" id="category_id">
                                            @foreach ($categoryType as $value)
                                                <option value="{{ $value->id }}">{{ $value->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" value="{{ $productId->description }}"></textarea>
                                    @error('description')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="width: 340px">
                                <div class="mb-3">
                                    <label class="form-label">Image 1</label>
                                    <div class="d-flex align-items-end">
                                        <img src="{{ asset('uploads/' . $productId->thumbnail_a) }}"
                                            style="width: 100px; height: 80px" alt="Chưa có hình">
                                        <input type="file" name="thumbnail_a" class="form-control"
                                            value="{{ old('thumbnail_a') }}" accept="image/*">
                                    </div>
                                    @error('thumbnail_a')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 2</label>
                                    <div class="d-flex align-items-end">
                                        <img src="{{ asset('uploads/' . $productId->thumbnail_b) }}"
                                            style="width: 100px; height: 80px" alt="Chưa có hình">
                                        <input type="file" name="thumbnail_b" class="form-control"
                                            value="{{ old('thumbnail_b') }}" accept="image/*">
                                    </div>
                                    @error('thumbnail_b')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 3</label>
                                    <div class="d-flex align-items-end">
                                        <img src="{{ asset('uploads/' . $productId->thumbnail_c) }}"
                                            style="width: 100px; height: 80px" alt="Chưa có hình">
                                        <input type="file" name="thumbnail_c" class="form-control"
                                            value="{{ old('thumbnail') }}" accept="image/*">
                                    </div>
                                    @error('thumbnail_c')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 4</label>
                                    <div class="d-flex align-items-end">
                                        <img src="{{ asset('uploads/' . $productId->thumbnail_d) }}"
                                            style="width: 100px; height: 80px" alt="Chưa có hình">
                                        <input type="file" name="thumbnail_d" class="form-control"
                                            value="{{ old('thumbnail') }}" accept="image/*">
                                    </div>
                                    @error('thumbnail_d')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
