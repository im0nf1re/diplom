<div class="row form-group mt-5 pb-3">
    <div class="col">
        <h2>Реквизиты платежного документа</h2>
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Статус лица:*</label>
    </div>
    <div class="col-md-9">
        <select class="form-control" aria-label="Default select example" data-payer-statuses>
            <option selected></option>
            @foreach($payerStatuses as $payerStatus)
                <option value="{{ $payerStatus->id }}">{{ $payerStatus->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row form-group mb-3">
    <div class="col-md-3">
        <label>Основание платежа:*</label>
    </div>
    <div class="col-md-9">
        <select class="form-control" aria-label="Default select example" data-payment-bases>
            <option selected></option>
        </select>
    </div>
</div>
<div class="row form-group mb-3" data-data-kind>

</div>
<div class="row form-group mb-5">
    <div class="col-md-3">
        <label>Сумма платежа:*</label>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" data-amount>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-12">
        <button class="btn btn-outline-success float-right" data-next="fio">Далее</button>
    </div>
</div>
