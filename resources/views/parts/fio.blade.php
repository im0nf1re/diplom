<div class="row form-group mt-5 pb-3">
    <div class="col">
        <h2>Реквизиты плательщика</h2>
    </div>
</div>
@if (Auth::check() && $user->role->name == 'worker')
    <div class="row form-group mb-3 ">
        <div class="col-md-3">
            <label>Пользователь, которому присвоится документ:*</label>
        </div>
        <div class="col-md-9">
            <select class="form-control" aria-label="Default select example" data-user-id>
                <option selected></option>
                @foreach($users as $userItem)
                    <option value="{{ $userItem->id }}">[{{ $userItem->id }}] {{ $userItem->surname }} {{ $userItem->firstname }} {{ $userItem->patronymic }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Фамилия:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-surname autocomplete="off" value="{{ (Auth::check() && $user->role->name != 'worker' ? $user->surname : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Имя:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-firstname autocomplete="off" value="{{ (Auth::check() && $user->role->name != 'worker' ? $user->firstname : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Отчество:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-patronymic autocomplete="off" value="{{ (Auth::check() && $user->role->name != 'worker' ? $user->patronymic : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>ИНН:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" data-inn value="{{ (Auth::check() && $user->role->name != 'worker' ? $user->inn : '') }}">
    </div>
</div>
<div class="row form-group mb-3 ">
    <div class="col-md-3">
        <label>Адрес места жительства:*</label>
    </div>
    <div class="col-md-9">
        <input type="text" class="form-control" autocomplete="off" data-address value="{{ (Auth::check() && $user->role->name != 'worker' ? $user->address : '') }}">
    </div>
</div>
<div class="row form-group">
    <div class="col-md-12">
        <button class="btn btn-outline-success float-right" data-next="ready">Далее</button>
    </div>
</div>
