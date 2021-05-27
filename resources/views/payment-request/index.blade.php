@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($paymentRequests->count() <= 0)
            <div class="row justify-content-center mb-5 pt-5">
                <div class="col-md-10 text-center pt-5">
                    <p class="lead">Нет ни одного документа (</p>
                </div>
            </div>
        @endif
        @foreach ($paymentRequests as $paymentRequest)
            <div class="row justify-content-center mb-5">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Индекс документа: {{ $paymentRequest->number }}
                        </div>
                        <div class="card-body">
                            <p>Получатель: {{ $paymentRequest->company_name }}</p>
                            <p>Плательщик: {{ $paymentRequest->payer_name }}</p>
                            <p>Назначение платежа: {{ $paymentRequest->description }}</p>
                        </div><div class="card-footer">
                            <a href="/payment-request/{{ $paymentRequest->id }}" class="btn btn-outline-primary" target="_blank">Просмотреть</a>
                            <a href="/payment-request/download-from-lk/{{ $paymentRequest->id }}" class="btn btn-primary">Скачать</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
