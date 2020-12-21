@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ваш профиль</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="surname" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Имя</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="name" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Отчество</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="patronymic" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">ИНН</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="inn" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Адрес</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="address" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary" formnovalidate>
                                Сохранить
                            </button>
                        </div>
                    </div>
{{--                    <table>--}}
{{--                        <p class="title">ИФНС</p>--}}
{{--                        <tr>--}}
{{--                            <th>Название</th>--}}
{{--                            <th>Код</th>--}}
{{--                        </tr>--}}
{{--                        @foreach($ifns as $item)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $item->name }}</td>--}}
{{--                                <td>{{ $item->code }}</td>--}}
{{--                                <td><button>Изменить</button></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        <tr>--}}
{{--                            <td><input type="text" style="width: 100%"></td>--}}
{{--                            <td><input type="text"></td>--}}
{{--                            <td><button>Сохранить</button></td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
