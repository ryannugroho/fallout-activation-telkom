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
                <form action="/register" method="post">
                    @csrf
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                            placeholder="Nama Lengkap" required value="{{ old('name') }}">
                        <label for="nama">Nama Lengkap</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" placeholder="Masukan Email" required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-2">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                            placeholder="Enter password" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2 d-flex justify-content-lg-end">
                        <div>
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection