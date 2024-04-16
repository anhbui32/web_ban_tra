@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('admin.mainSection')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="">
                <div class="bg-secondary rounded p-4" style="height: 670px">
                    <h4 class="mb-4">Category Form</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <form method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="d-flex align-items-end">
                            <div style="width: 510px">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Category</label>
                                    <input type="text" name="category_id" class="form-control w-25" readonly
                                        value="{{ $category->id }}">
                                </div>
                            </div>
                            <div style="width: 250px">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="type_name" class="form-control"
                                        value="{{ $category->type_name }}">
                                    @error('category_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
