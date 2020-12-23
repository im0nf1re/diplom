<div class="col-md-3">
    <label>{{ $dataKind->name }}*</label>
</div>
<div class="col-md-4">
    @if ($dataKind->field_type == 'select')
        <select class="form-control" aria-label="Default select example" data-periods>
            <option selected></option>
            @foreach($dataKind->periods as $period)
                <option data-kind="{{ $dataKind->code }}" value="{{ $period->id }}">{{ $period->name }}</option>
            @endforeach
        </select>
    @else
        <input type="date" class="form-control" data-date="datepicker" data-kind="{{ $dataKind->code }}">
    @endif
</div>
<div class="col-md-4" data-period-items>

</div>
