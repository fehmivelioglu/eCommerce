@extends('layouts.default')

@section('title', 'Ürün Detayı')

@section('content')
    <main class="container py-5">
        <section class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-md-6">
                @if ($product->image)
                    <img src="{{ asset('assets/img/astronaut.jpg') }}" class="img-fluid rounded" alt="{{ $product->title }}">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                        <span class="text-muted">Görsel Yok</span>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h1 class="mb-4">{{ $product->title }}</h1>
                <p class="lead mb-4">{{ $product->description }}</p>
                <div class="d-flex align-items-center mb-4">
                    <h2 class="text-primary mb-0">{{ number_format($product->price, 2) }} ₺</h2>
                </div>
                <div class="d-grid gap-2">
                    <a href="{{ route('addToCart', $product->id) }}" class="btn btn-primary btn-lg">Sepete Ekle</a>
                </div>
            </div>
        </section>
    </main>
@endsection
