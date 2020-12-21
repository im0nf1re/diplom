<option selected></option>
@foreach($paymentBases as $paymentBasis)
    <option value="{{ $paymentBasis->id }}">{{ $paymentBasis->name }}</option>
@endforeach
