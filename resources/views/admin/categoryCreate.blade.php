@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('admin.mainSection')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="">
                <div class="bg-secondary rounded p-4">
                    <h4 class="mb-4">Create Category</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
                        {{-- @method('') --}}
                        <div class="d-flex align-items-end">
                            <div style="width: 510px">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Category</label>
                                    <input class="form-control w-25" readonly
                                        placeholder="ID tự sinh">
                                </div>
                            </div>
                            <div style="width: 250px">
                                <div class="mb-3">
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="type_name" class="form-control"
                                        value="{{ old('category_name') }}" aria-describedby="emailHelp">
                                    @error('category_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
