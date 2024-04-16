@extends('clients.registerAndLogIn')
@section('title')
    {{ $title }}
@endsection()
@section('formContent')
    <div>
        <p class="text-success">
            {!! session('mess') ? session('mess') : '' !!}
        </p>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please check the field data again!
                        </div>
                    @endif
                    <div class="text-center mb-3">
                        <p>Sign in with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>

                    <p class="text-center">or:</p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">Email</label>
                        <input name="mailIn" type="email" id="loginName" value="{{ old('mailIn') }}"
                            class="form-control" />
                        @error('mailIn')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginPassword">Password</label>
                        <input name="passwordIn" type="password" id="loginPassword" class="form-control" />
                        @error('passwordIn')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input name="remember" class="form-check-input" type="checkbox" value=""
                                    id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                            <a href="{{ route('nguoidung.verifyMail', ) }}">Nhấp vào link để kích hoạt tài khoản</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="{{ route('nguoidung.formRegister') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
