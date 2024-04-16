@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('admin.mainSection')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="">
                <div class="bg-secondary rounded p-4">
                    <h4 class="mb-4">Create Product</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="d-flex justify-content-between">
                            <div style="width: 340px">
                                <div class="mb-3">
                                    <label class="form-label">ID Product</label>
                                    <input class="form-control w-50" placeholder="ID tự sinh" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                    @error('title')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                    @error('price')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control"
                                        value="{{ old('quantity') }}">
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
                                    <input type="file" name="thumbnail" class="form-control"
                                        value="{{ old('thumbnail') }}" accept="image/*">
                                    @error('thumbnail')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Discount</label>
                                    <input type="number" name="discount" class="form-control"
                                        value="{{ old('discount') }}" accept="image/*">
                                    @error('discount')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Type</label>
                                    <select name="category_id" id="category_id">
                                        @foreach ($categoryType as $value)
                                            <option value="{{ $value->id }}">{{ $value->type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea type="" name="description" class="form-control" value="{{ old('description') }}"></textarea>
                                    @error('description')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="width: 340px">
                                <div class="mb-3">
                                    <label class="form-label">Image 1</label>
                                    <input type="file" name="thumbnail_a" class="form-control"
                                        value="{{ old('thumbnail_a') }}" accept="image/*">
                                    @error('thumbnail_a')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 2</label>
                                    <input type="file" name="thumbnail_b" class="form-control"
                                        value="{{ old('thumbnail_b') }}" accept="image/*">
                                    @error('thumbnail_b')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 3</label>
                                    <input type="file" name="thumbnail_c" class="form-control"
                                        value="{{ old('thumbnail_c') }}" accept="image/*">
                                    @error('thumbnail_c')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 4</label>
                                    <input type="file" name="thumbnail_d" class="form-control"
                                        value="{{ old('thumbnail_d') }}" accept="image/*">
                                    @error('thumbnail_d')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
