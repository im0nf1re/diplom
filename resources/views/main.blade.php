@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-sm-around text-center" style="padding-top:200px">
            <h1>Платежные документы онлайн</h1>
            <p class="lead">На нашем сайте вы можете заполнить и распечатать документы для организаций,<br>
                индивидуальных предпринимателей и частных лиц.</p>
            <div class="col-md-5 text-center">
                <div class="card" style="min-height: 300px">
                    <div class="card-header text-uppercase">
                        Платежное поручение (налог)
                    </div>
                    <div class="card-body">
                        Платежным поручением является
                        распоряжение владельца счета (плательщика)
                        обслуживающему его банку, оформленное расчетным документом,
                        перевести определенную денежную сумму на счет получателя средств,
                        открытый в этом или другом банке.
                    </div>
                    <div class="card-footer text-center">
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-success" >Сформировать</button>
                    </div>
                </div>

            </div>
            <div class="col-md-5 text-center">
                <div class="card" style="min-height: 300px">
                    <div class="card-header text-uppercase">
                        Платежное требование
                    </div>
                    <div class="card-body">
                        Платежное требование – это расчетный документ,
                        в котором содержится требование взыскателя денежных средств
                        (кредитора, поставщика, получателя) к должнику (плательщику)
                        о перечислении определенной суммы на его банковский счет в уплату долга.
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('payment-request.create') }}" class="btn btn-outline-success" >Сформировать</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
