<option selected></option>
@foreach($paymentNames as $paymentName)
    <option value="{{ $paymentName->id }}">{{ $paymentName->name }}</option>
@endforeach
