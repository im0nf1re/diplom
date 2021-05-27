@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="paymentRequest" action="{{ route('payment-request.download') }}" method="post">
                    @csrf
                    <div class="row mt-5">
                        <div class="form-group col-md-8">
                            <div class="col-md-6">
                                <label for="number" class="col-form-label">
                                    Платежное требование №:
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input autocomplete="off" type="text" class="form-control" value="" name="number" id="number">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="col-md-3">
                                <label for="date_from" class="col-form-label">
                                    от
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input required autocomplete="off" type="date" class="form-control" value="{{ date('Y-m-d') }}" name="date_from" id="date_from">
                            </div>
                        </div>
                    </div>

                    @include('payment-request.parts.company')

                    @include('payment-request.parts.payer')

                    @include('payment-request.parts.sum')

                    @include('payment-request.parts.payment-purpose')

                </form>
            </div>
        </div>
    </div>
@endsection
