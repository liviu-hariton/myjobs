<div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_0" value="" @checked(!request($name))>
        <label class="form-check-label" for="{{ $name }}_0">All</label>
    </div>

    @foreach($optionsWithLabels as $label=>$option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $option }}" @checked(request($name) === $option)>
            <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
        </div>
    @endforeach
</div>
