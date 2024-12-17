<form action="{{ $action }}" method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" {{ $enctype ? "enctype=$enctype" : '' }} {{ $attributes->merge(['class' => 'form']) }}>
    @csrf
    @if(in_array($method, ['PUT', 'PATCH', 'DELETE']))
    @method($method)
    @endif

    @php
    $submitText = App::getLocale() === 'id' ? 'Simpan' : 'Submit';
    $resetText = App::getLocale() === 'id' ? 'Atur Ulang' : 'Reset';
    @endphp


    <div class="row">
        {{ $slot }}
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">{{ $submitText }}</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">{{ $resetText }}</button>
        </div>
    </div>
</form>
