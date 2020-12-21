@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="paymentDocument">
                    <div class="row form-group mt-5">
                        <div class="col">
                            <h2>Тип налогоплательщика и вид расчетного документа</h2>
                            <p class="mt-3">Налогоплательщик: Физическое лицо</p>
                            <p>Расчетный документ: Платежный документ</p>
                            <input type="hidden" value="{{ $id }}" name="payer_type" data-payer-type>
                        </div>
                    </div>

                    <div class="row form-group mt-5 pb-3">
                        <div class="col">
                            <h2>Рекизиты получателя платежа</h2>
                        </div>
                    </div>
                    <div class="row form-group mb-3 ">
                        <div class="col-md-3">
                            <label>Код ИФНС*:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" data-toggle="modal" data-target="#ifnsModal" data-ifns-field>
                            <input type="hidden" name="ifns" data-hidden-ifns-field>
                        </div>
                    </div>

                    <!-- IFNS MODAL -->
                    <div id="ifnsModal" class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Выбор ИФНС</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        @foreach($subjects as $subject)
                                            <li class="region">
                                                <p>{{ $subject->code }} - {{ $subject->name }}</p>
                                                <ul class="my-hidden-list" data-opened="false" style="display: none">
                                                    @foreach ($subject->ifns as $ifns)
                                                        <li>
                                                            <input type="checkbox"
                                                                   class="form-check-input"
                                                                   data-dismiss="modal"
                                                                   aria-label="Close"
                                                                   data-subject="{{ $subject->id }}"
                                                                   value="{{ $ifns->id }}">
                                                            <label data-ifns-name for="">{{ $ifns->code }} - {{ $ifns->name }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group mb-5">
                        <div class="col-md-3">
                            <label>Код ОКТМО*:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" aria-label="Default select example" data-oktmo-select>

                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button class="btn btn-outline-success float-right" data-next="paymentKind">Далее</button>
                        </div>
                    </div>





                </form>
            </div>
        </div>
    </div>
@endsection
