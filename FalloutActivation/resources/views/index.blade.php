@extends('layouts.main')
@section('content')

<section class="vh-100">
    <div class="container-fluid h-custom" style="margin-top: 100px;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5" style="margin-left: 200px;">
                <img src="https://www.telkom.co.id/images/logo_vertical.svg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="margin-left: -200px;">
                @if(session()->has('Success'))
                    <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                        {{ session('Success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show fadeInUp" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Loader -->
                <div id="loader" class="loader" style="display: none;"></div>

                <form id="login-form" action="{{ route('login') }}" method="post">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" placeholder="Masukan Email Kamu" required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                            placeholder="Enter password" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2 d-flex justify-content-lg-end">
                        <div>
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>
                    </div>
                    <div class="me-lg-auto">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                                class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection