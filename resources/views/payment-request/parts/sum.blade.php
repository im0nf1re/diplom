<div class="mt-5 border-bottom">
    <div class="row form-group">
        <div class="col-md-3">
            <label for="sum">Сумма:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="sum" name="sum">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="request_payment_kind">Вид платежа:</label>
        </div>
        <div class="col-md-9">
            <select required class="form-control" aria-label="Default select example" id="request_payment_kind" name="request_payment_kind">
                @foreach($requestPaymentKinds as $requestPaymentKind)
                    <option value="{{ $requestPaymentKind->id }}">{{ $requestPaymentKind->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="documents_send_date">Дата отсылки документов:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="date" class="form-control" id="documents_send_date" name="documents_send_date">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label>Акцепт:</label>
        </div>
        <div class="col-md-9">
            <label class="form-check-label" for="with" style="width: 30%">
                <input class="form-check-input" type="radio" name="accept" id="with" value="1" checked>
                С акцептом
            </label>

            <label class="form-check-label" for="without" style="width: 30%">
                <input class="form-check-input" type="radio" name="accept" id="without" value="0">
                Без акцепта
            </label>
        </div>
    </div>
    <div class="row form-group" data-accept-period>
        <div class="col-md-3">
            <label for="accept_period">Срок акцепта:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="accept_period" name="accept_period">
        </div>
    </div>
    <div class="row form-group" data-payment-condition style="display: none">
        <div class="col-md-3">
            <label for="payment_condition">Условие оплаты:</label>
        </div>
        <div class="col-md-9">
            <input autocomplete="off" type="text" class="form-control" id="payment_condition" name="payment_condition">
        </div>
    </div>
</div>
