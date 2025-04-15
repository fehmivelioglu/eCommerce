@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-white text-center">
                    <img src="{{ asset('assets/img/astronaut.jpg') }}" alt="logo" class="logo w-100 h-auto">
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta Adresi</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Beni Hatırla</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Giriş Yap</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('register') }}" class="text-decoration-none">Kayıt Ol</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
