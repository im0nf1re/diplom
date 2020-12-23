@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/home/update" method="post">
                    @csrf
                    <div class="card-header">Ваш профиль</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="surname" autofocus value="{{ $user->surname }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="firstname" autofocus value="{{ $user->firstname }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Отчество</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="patronymic" autofocus value="{{ $user->patronymic }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">ИНН</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="inn" autofocus value="{{ $user->inn }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="address" autofocus value="{{ $user->address }}">

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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
