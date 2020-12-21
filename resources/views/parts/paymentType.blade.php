<option selected></option>
@foreach($paymentTypes as $paymentType)
    <option value="{{ $paymentType->id }}">{{ $paymentType->name }}</option>
@endforeach
