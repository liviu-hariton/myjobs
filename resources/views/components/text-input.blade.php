<div {{ $attributes->merge(['class' => 'input-group mb-3']) }}>
    <input type="text" class="form-control" value="{{ $value }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}">
    @if($formId)
        <a href="#" class="input-group-text text-decoration-none" onclick="document.getElementById('{{ $name }}').value='';document.getElementById('{{ $formId }}').submit();return false;"><i class="fa fa-times"></i></a>
    @endif
</div>
