<div>
    <div class="row form-group mt-5">
        <div class="col">
            <h2>Назначение платежа</h2>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="description">Содержание:</label>
        </div>
        <div class="col-md-9">
            <textarea class="form-control" id="description" name="description"></textarea>
            <a class="btn btn-outline-success mt-1" data-fill-sum>Заполнить сумму платежа</a>
        </div>

    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="nds_string">НДС:</label>
        </div>
        <div class="col-md-9">
            <input autocomplete="off" type="text" class="form-control" id="nds_string" name="nds_string">
            <a class="btn btn-outline-success mt-1" data-fill-nds>Заполнить НДС</a>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-6">
            <a href='javascript:void(0)' class="btn btn-primary float-right" data-download-payment-request>Скачать</a>
        </div>
        @auth
            <div class="col-md-6">
                <a href='javascript:void(0)' class="btn btn-success float-left" data-save-payment-request>Сохранить</a>
            </div>
        @endauth
    </div>
</div>
