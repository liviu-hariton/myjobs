<div {{ $attributes->merge(['class' => 'input-group mb-3']) }}>
    <input x-ref="input-{{ $name }}" type="text" class="form-control" value="{{ $value }}" name="{{ $name }}" id="input-{{ $name }}" placeholder="{{ $placeholder }}">
    @if($formRef)
        <a href="javascript:void(0)" class="input-group-text text-decoration-none" @click="$refs['input-{{ $name }}'].value='';$refs['{{ $formRef }}'].submit();"><i class="fa fa-times"></i></a>
    @endif
</div>
