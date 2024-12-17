<div class="col-12">
    <div class="form-group">
        @if($label)
        <label for="first-name-vertical"> {{ $label }}
            @if($required) <span class="text-red">*</span> @endif
        </label>
        @endif

        @if($type === 'text' || $type === 'password' || $type === 'email')
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }} class="form-control">
        @elseif($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }} class="form-control">
            @foreach($options as $key => $option)
            <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>
                {{ $option }}
            </option>
            @endforeach
        </select>
        @elseif($type === 'radio')
        @foreach($options as $key => $option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{ $name }}" id="radio_{{ $key }}" value="{{ $key }}" {{ $key == $value ? 'checked' : '' }}>
            <label class="form-check-label" for="radio_{{ $key }}">
                {{ $option }}
            </label>
        </div>
        @endforeach

        @endif
        {{-- <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name"> --}}
    </div>
</div>
