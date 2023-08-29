@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'post', 'class' => 'form-padrao']) !!}

@include('template.formulario.input', ['label' => 'Name product', 'input' => 'name'])
@include('template.formulario.input', ['label' => 'Description', 'input' => 'description'])
@include('template.formulario.input', ['label' => 'indexer', 'input' => 'index'])
@include('template.formulario.input', ['label' => 'Interest rate', 'input' => 'interest_rate'])
@include('template.formulario.submit', ['input' => 'Register'])


{!! Form::close() !!}


@endsection