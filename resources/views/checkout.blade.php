@extends('layouts.default')

@section('title', 'Güvenli Ödeme')

@section('content')


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Ödeme Bilgileri</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route(name: 'paymentProcess') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Kart Üzerindeki İsim</label>
                                <input type="text" class="form-control" id="cardName" name="cardName" required>
                            </div>

                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Kart Numarası</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                    placeholder="1234 5678 9012 3456" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiryDate" class="form-label">Son Kullanma Tarihi</label>
                                    <input type="text" class="form-control" id="expiryDate" name="expiryDate"
                                        placeholder="AA/YY" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv"
                                        placeholder="123" required>
                                </div>
                            </div>


                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-lock me-2"></i>Güvenli Ödeme Yap
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
