
<label class="{{ $class ?? null}}">
    <span>{{ $label ?? $input ?? "ERRO"}}</span>
    {!! Form::password($input, ['class' => 'form-control'], $attributes)!!}

</label>
