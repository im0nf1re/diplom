<div class="row form-group mt-5 pb-3">
    <div class="col">
        <h2>Реквизиты плательщика</h2>
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Фамилия:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-surname autocomplete="off" value="{{ (Auth::check() ? $user->surname : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Имя:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-firstname autocomplete="off" value="{{ (Auth::check() ? $user->firstname : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Отчество:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-patronymic autocomplete="off" value="{{ (Auth::check() ? $user->patronymic : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>ИНН:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-inn value="{{ (Auth::check() ? $user->inn : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Адрес места жительства:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" autocomplete="off" data-address value="{{ (Auth::check() ? $user->address : '') }}">
    </div>
</div>
<div class="row form-group">
    <div class="col-md-12">
        <button class="btn btn-outline-success float-right" data-next="ready">Далее</button>
    </div>
</div>
