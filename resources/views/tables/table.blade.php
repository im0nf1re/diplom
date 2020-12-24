@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                        <table>
                            <p class="title">{{ $table->name }}</p>
                            <tr>
                                <th>id</th>
                                @foreach($fields as $field)
                                    <th>{{ $field->name }}</th>
                                @endforeach
                            </tr>
                            @foreach($elems as $elem)
                                <form action="/tables/{{ $table->code }}/update" method="post">
                                    @csrf
                                    <tr>
                                        <td><input type="text" name="id" value="{{ $elem['id'] }}"></td>
                                        @foreach($fields as $field)
                                            <td><input type="text" name="{{ $field->code }}" value="{{ $elem[$field->code] }}"></td>
                                        @endforeach
                                        <td><button type="submit" name="change" value="change">Изменить</button></td>
                                        <td><button type="submit" name="delete" value="delete">Удалить</button></td>
                                    </tr>
                                </form>
                            @endforeach
                            <form action="/tables/{{ $table->code }}/update" method="post">
                                @csrf
                                <tr>
                                    <td></td>
                                    @foreach($fields as $field)
                                        <td><input type="text" name="{{ $field->code }}" value=""></td>
                                    @endforeach
                                    <td><button type="submit" name="add" value="add">Добавить</button></td>
                                </tr>
                            </form>
                        </table>

            </div>
        </div>
    </div>
@endsection
