@extends('layouts.default')

@section('title', 'Ürünler')

@section(section: 'content')
    <main class="container">
        <section class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('assets/img/astronaut.jpg') }}" class="card-img-top" alt="{{ $product->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="text-muted">Görsel Yok</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">{{ number_format($product->price, 2) }} ₺</span>
                                <a href="{{ route('details', $product->id) }}" class="btn btn-primary">Detaylar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                {{$products->links()}}
            </div>
        </section>
    </main>
@endsection
