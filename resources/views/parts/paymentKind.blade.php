<div class="row form-group mt-5 pb-3">
    <div class="col">
        <h2>Вид платежа</h2>
        <small>Поле КБК заполнится автоматически после заполнения остальных полей</small>
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>КБК*:</label>
    </div>
    <div class="col-md-9">
        <input data-kbk type="text" class="form-control">
    </div>
</div>
<div class="row form-group mb-3">
    <div class="col-md-3">
        <label>Вид Платежа:</label>
    </div>
    <div class="col-md-9">
        <select class="form-control" aria-label="Default select example" data-payment-kind>
            <option selected></option>
            @foreach($paymentKinds as $paymentKind)
                <option value="{{ $paymentKind->id }}">{{ $paymentKind->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row form-group mb-3">
    <div class="col-md-3">
        <label>Наименование платежа:</label>
    </div>
    <div class="col-md-9">
        <select class="form-control" aria-label="Default select example" data-payment-name>
            <option selected></option>
        </select>
    </div>
</div>
<div class="row form-group mb-5">
    <div class="col-md-3">
        <label>Тип платежа:</label>
    </div>
    <div class="col-md-9">
        <select class="form-control" aria-label="Default select example" data-payment-type>
            <option selected></option>
        </select>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-12">
        <button class="btn btn-outline-success float-right" data-next="payerStatuses">Далее</button>
    </div>
</div>
