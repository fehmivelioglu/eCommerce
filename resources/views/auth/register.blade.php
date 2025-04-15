@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-white text-center">
                    <img src="{{ asset('assets/img/astronaut.jpg') }}" alt="logo" class="logo w-100 h-auto">
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Adınız</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('login') }}" class="text-decoration-none">Zaten bir hesabınız var mı? Giriş Yap</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
