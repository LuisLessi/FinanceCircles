@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::model($institution, ['route' => ['institution.update', $institution->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

@include('template.formulario.input', ['label' => 'Name', 'input' => 'name', 'attributes' => ['placeholder' => 'Name']])
@include('template.formulario.submit', ['input' => 'Update'])

{!! Form::close() !!}

@endsection