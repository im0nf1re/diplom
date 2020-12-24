@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Таблицы</div>

                    <div class="card-body">
                        @foreach($tables as $table)
                            <p><a href="/tables/{{ $table->code }}">{{ $table->name }}</a></p>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
