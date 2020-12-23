@extends('layouts.app')

@section('content')
<div class="container">
    @if ($paymentDocuments->count() <= 0)
        <div class="row justify-content-center mb-5 pt-5">
            <div class="col-md-10 text-center pt-5">
                <p class="lead">Нет ни одного документа (</p>
            </div>
        </div>
    @endif
    @foreach ($paymentDocuments as $paymentDocument)
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Индекс документа: {{ $paymentDocument->id }}
                    </div>
                    <div class="card-body">
                        <p>Наименование платежа: {{ $paymentDocument->kbk->paymentName->name }}</p>
                        <p>Сумма: {{ $paymentDocument->amount }}</p>
                    </div><div class="card-footer">
                        <a href="/documents/show/{{ $paymentDocument->id }}" class="btn btn-outline-primary" target="_blank">Просмотреть</a>
                        <a href="/documents/download/{{ $paymentDocument->id }}" class="btn btn-primary">Скачать</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
