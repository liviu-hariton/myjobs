<div>
    @if($all)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_0" value="" @checked(!request($name))>
            <label class="form-check-label" for="{{ $name }}_0">All</label>
        </div>
    @endif

    @foreach($optionsWithLabels as $label=>$option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $option }}" value="{{ $option }}" @checked($option === (request($name) ?? $value))>
            <label class="form-check-label" for="{{ $option }}">{{ $label }}</label>
        </div>
    @endforeach

        @error($name)
        <p><span class="badge text-bg-danger">{{ $message }}</span></p>
        @enderror
</div>
