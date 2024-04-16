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
                        <h4 class="mb-4">List User</h4>
                        <a class="btn btn-primary" href="{{ route('users.create') }}">Create</a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col" class="text-end">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->user_name }}</td>
                                        <td><img src="{{ asset('uploads/' . $value->image) }}" alt="Chưa có hình ảnh"
                                                class="img-thumbnail" style="width: 50px; height: 50px"></td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone_number }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('users.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('users.edit', $value->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                @method('DELETE')
                                                <button class="btn btn-primary btn-sm" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                                {{-- <a href="{{ route('users.destroy', $value->id) }}"
                                                    class="btn btn-primary">Delete</a> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $allUsers->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
