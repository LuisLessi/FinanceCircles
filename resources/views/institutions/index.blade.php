@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'institution.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

@include('template.formulario.input', ['label' => 'Institution name', 'input' => 'name', 'attributes' => ['placeholder' => 'Institution name']])
@include('template.formulario.submit', ['input' => 'Register'])

{!! Form::close() !!}

<table class="default-table">
    <thead>
        <tr>
            <td>#</td>
            <td>Institution name</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody class="options-cell">
        @foreach($institutions as $institution)
        <tr>
            <td>{{$institution->id}}</td>
            <td>{{$institution->name}}</td>
            <td>
                {!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'delete']) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
                <br>
                <a href="{{ route('institution.show', $institution->id) }}"
                class="details-button">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection