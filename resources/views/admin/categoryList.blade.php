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
                        <h4 class="mb-4">List Category</h4>
                        <a class="btn btn-primary" href="{{ route('category.create') }}">Create</a>
                    </div>
                    @if (Session::has('notice'))
                        <p class="alert alert-success">{{ Session::get('notice') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    @if (Session::has('mess'))
                        <div class="alert alert-success">
                            {{ Session::get('mess') }}
                        </div>
                    @endif
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name Catogory</th>
                                    <th scope="col">Create At</th>
                                    <th scope="col">Update At</th>
                                    <th scope="col" class="text-end">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->type_name }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('category.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('category.edit', $value->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                @method('DELETE')
                                                <button class="btn btn-primary btn-sm" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                                {{-- <a href="{{ route('category.destroy', $value->id) }}"
                                                    class="btn btn-primary">Delete</a> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
