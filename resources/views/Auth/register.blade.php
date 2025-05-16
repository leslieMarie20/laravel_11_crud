@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h1 class="instagram-logo mb-4">Laravel Crud</h1>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" 
                                   class="form-control instagram-input @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   placeholder="Full Name"
                                   value="{{ old('name') }}"
                                   autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="email" 
                                   class="form-control instagram-input @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   placeholder="Email"
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" 
                                   class="form-control instagram-input @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" 
                                   class="form-control instagram-input @error('password_confirmation') is-invalid @enderror" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary instagram-button">
                                Sign up
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body text-center py-3">
                    <p class="mb-0">Already have an account? 
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Log in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    body {
        background-color: #fafafa;
    }
    .instagram-logo {
        font-family: 'Instagram Sans Script', cursive;
        font-size: 2.5rem;
        font-weight: 600;
        background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .instagram-input {
        background-color: #fafafa;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
        padding: 9px 8px;
        font-size: 0.9rem;
    }
    .instagram-input:focus {
        border-color: #a8a8a8;
        box-shadow: none;
    }
    .instagram-button {
        background-color: #0095f6;
        border: none;
        border-radius: 4px;
        color: white;
        font-weight: 600;
        padding: 7px 16px;
    }
    .instagram-button:hover {
        background-color: #0086e6;
    }
    .card {
        border-radius: 1px;
    }
    .text-muted {
        color: #8e8e8e !important;
    }
    a {
        color: #0095f6;
    }
    a:hover {
        color: #0086e6;
    }
</style>
@endpush
@endsection


