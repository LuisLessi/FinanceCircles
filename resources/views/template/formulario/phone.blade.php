<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? "ERRO" }}</span>
    {!! Form::text($input, old($input), array_merge(['pattern' => '\(\d{2}\) \d{5}-\d{4}', 'title' => 'Phone format must be: (XX) XXXXX-XXXX'], $attributes)) !!}
</label>
