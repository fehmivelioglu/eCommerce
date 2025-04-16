@extends('layouts.default')

@section('title', 'Siparişler')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Siparişlerim</h1>
    
    @if(count($orders) > 0)
        <div class="row">
            @foreach($orders as $order)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Sipariş #{{ $order->id }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Sipariş Tarihi:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
                            <p class="card-text"><strong>Toplam Tutar:</strong> {{ number_format($order->total_price, 2) }} TL</p>
                            <p class="card-text"><strong>Durum:</strong> 
                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'info') }}">
                                    {{ $order->status == 'completed' ? 'Tamamlandı' : ($order->status == 'pending' ? 'Beklemede' : 'İşleniyor') }}
                                </span>
                            </p>
                            {{-- <a href="{{ route('order.details', $order->id) }}" class="btn btn-outline-primary">Detayları Görüntüle</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Henüz hiç siparişiniz bulunmamaktadır.
        </div>
    @endif
</div>
@endsection
