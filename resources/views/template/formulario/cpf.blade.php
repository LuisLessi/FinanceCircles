<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? "ERRO" }}</span>
    {!! Form::text($input, old($input), array_merge(['pattern' => '[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}', 'title' => 'Informe um CPF válido no formato XXX.XXX.XXX-XX'], $attributes)) !!}
</label>
