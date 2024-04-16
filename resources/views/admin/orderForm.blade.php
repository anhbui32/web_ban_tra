@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('admin.mainSection')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="">
                <div class="bg-secondary rounded p-4" style="height: 600px">
                    <h4 class="mb-4">User Form</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="d-flex justify-content-between">
                            {{-- <div style="width: 570px">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                                    <input type="text" name="phone_number" class="form-control" id=""
                                        aria-describedby="">
                                    @error('phoneNumber')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                    @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="checkMe" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Hình ảnh:</label>
                                    <input type="file" name="fileMedia" class="form-control" id="avatar"
                                        accept="image/*" required>
                                    @error('fileMedia')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div style="width: 570px">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
                                    <input type="text" name="user_name" class="form-control" id=""
                                        aria-describedby="">
                                    @error('user_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('address')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Vai trò</label>
                                    <input type="number" name="role" class="form-control" value="0" id="exampleInputPassword1">
                                    @error('role')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
