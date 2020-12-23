@if ($periodItems->count() > 0)
    <select class="form-control" aria-label="Default select example" data-date="period-item" data-period="{{$periodId}}">
        <option selected></option>
        @foreach($periodItems as $periodItem)
            <option value="{{ $periodItem->id }}">{{ $periodItem->name }}</option>
        @endforeach
    </select>
@endif

@if ($periodId != 1)
    <input type="text" class="form-control" placeholder="Год" data-date="year" value="2020" data-period="{{$periodId}}">
@else
    <input type="date" class="form-control" data-date="datepicker" data-period="{{$periodId}}">
@endif
