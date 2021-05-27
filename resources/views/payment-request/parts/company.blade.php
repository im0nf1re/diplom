<div class="border-bottom">
    <div class="row form-group mt-5">
        <div class="col">
            <h2>Информация об организации</h2>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="company_name">Название компании:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="company_name" name="company_name">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="company_inn">ИНН:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="company_inn" name="company_inn">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="nds">Ставка НДС:</label>
        </div>
        <div class="col-md-9">
            <select required class="form-control" aria-label="Default select example" id="nds" name="nds">
                @foreach($nds as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row form-group mt-5">
        <div class="col">
            <h2>Банковские реквизиты организации</h2>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="company_bank_bik">БИК:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="company_bank_bik" name="company_bank_bik">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="company_bank_name">Наименование банка:</label>
        </div>
        <div class="col-md-9">
            <textarea required class="form-control" id="company_bank_name" name="company_bank_name"></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="company_corr_account">Корр. счет №:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="company_corr_account" name="company_corr_account">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="company_rass_account">Расчетный счет №:</label>
        </div>
        <div class="col-md-9">
            <input required autocomplete="off" type="text" class="form-control" id="company_rass_account" name="company_rass_account">
        </div>
    </div>


</div>
