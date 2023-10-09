<div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_0" value="" @checked(!request($name))>
        <label class="form-check-label" for="{{ $name }}">All</label>
    </div>

    @foreach($optionsWithLabels as $label=>$option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_1" value="{{ $option }}" @checked(request($name) === $option)>
            <label class="form-check-label" for="{{ $name }}_1">{{ $label }}</label>
        </div>
    @endforeach
</div>
