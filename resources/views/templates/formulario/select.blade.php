
<label class="{{ $class ?? null}}">

    <span>{{ $label ?? $select ?? "ERRO"}}</span>

    {!! Form::select($select, $data ?? null, ['class' => 'form-control'])!!}

</label>
