@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('admin.mainSection')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="">
                <div class="bg-secondary rounded p-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-4">List Products</h4>
                        <a class="btn btn-primary" href="{{ route('products.create') }}">Create</a>
                    </div>
                    {{ $products->appends(request()->all())->links() }}
                    @if (Session::has('notice'))
                        <p class="alert alert-success">{{ Session::get('notice') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Image1</th>
                                    <th scope="col">Image2</th>
                                    <th scope="col">Image3</th>
                                    <th scope="col">Image4</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Create At</th>
                                    <th scope="col">Update At</th>
                                    <th scope="col" class="text-end">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <th scope="row">{{ $value->productsOneToOne->type_name }}</th>
                                        <th scope="row">{{ $value->title }}</th>
                                        <td><img src="{{ asset('uploads/' . $value->thumbnail) }}" alt="Chưa có hình ảnh"
                                                class="img-thumbnail" style="width: 50px; height: 50px"></td>
                                        <th scope="row">{{ $value->price }}</th>
                                        <th scope="row">{{ $value->discount }}</th>
                                        <td><img src="{{ asset('uploads/' . $value->thumbnail_a) }}" alt="Chưa có hình ảnh"
                                                class="img-thumbnail" style="width: 50px; height: 50px"></td>
                                        <td><img src="{{ asset('uploads/' . $value->thumbnail_b) }}" alt="Chưa có hình ảnh"
                                                class="img-thumbnail" style="width: 50px; height: 50px"></td>
                                        <td><img src="{{ asset('uploads/' . $value->thumbnail_c) }}" alt="Chưa có hình ảnh"
                                                class="img-thumbnail" style="width: 50px; height: 50px"></td>
                                        <td><img src="{{ asset('uploads/' . $value->thumbnail_d) }}" alt="Chưa có hình ảnh"
                                                class="img-thumbnail" style="width: 50px; height: 50px"></td>
                                        <td>{{ $value->description }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('products.destroy', $value->id) }}" method="POST"
                                                class="d-flex flex-col">
                                                @csrf
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('products.edit', $value->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                @method('DELETE')
                                                <button class="btn btn-primary btn-sm" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                                {{-- <a href="{{ route('products.destroy', $value->id) }}"
                                                    class="btn btn-primary">Delete</a> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
