@extends('clients.registerAndLogIn')
@section('title')
    {{ $title }}
@endsection
@section('formContent')
    <div>
        <div class="tab-content">
            <div class="" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form method="POST" action="">
                    @csrf
                    <div class="text-center mb-3">
                        <p>Sign up with:</p>
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

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="registerUsername">Username</label>
                        <input name="user_name" type="text" id="registerUsername" value="{{ old('user_name') }}"
                            placeholder="Input name" class="form-control" />
                        @error('user_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="registerEmail">Email</label>
                        <input name="email" type="email" id="registerEmail" value="{{ old('email') }}"
                            placeholder="Input Email" class="form-control" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="registerPassword">Password</label>
                        <input name="password" type="password" id="registerPassword" value="{{ old('password') }}"
                            placeholder="Password must contain at least 8 characters" class="form-control" />
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                        <input name="password_confirmation" type="password" id="registerRepeatPassword"
                            value="{{ old('password_confirmation') }}" placeholder="Confirm Password" class="form-control" />
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
