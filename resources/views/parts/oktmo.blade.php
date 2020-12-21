<option selected></option>
@foreach($oktmos as $oktmo)
    <option value="{{ $oktmo->id }}">{{ $oktmo->code }} - {{$oktmo->name}}</option>
@endforeach
