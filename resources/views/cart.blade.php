@extends('layouts.default')

@section('title', 'Ürünler')

@section(section: 'content')
    <main class="container">
        <section class="row">
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
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('assets/img/astronaut.jpg') }}" class="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">{{ number_format($product->price, 2) }} ₺</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-cart me-2"></i>Ödemeye Geç
                </a>
            </div>
        </div>
    </main>
@endsection
