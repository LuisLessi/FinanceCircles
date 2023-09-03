@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'moviment.getback.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

@include('template.formulario.select', ['label' => 'Group', 'select' => 'group_id', 'data' => $group_list ?? [], 'attributes' => ['placeholder' => 'Group']])
@include('template.formulario.select', ['label' => 'Product', 'select' => 'product_id', 'data' => $product_list ?? [], 'attributes' => ['placeholder' => 'Product']])
@include('template.formulario.input', ['label' => 'Value', 'input' => 'value', 'attributes' => ['placeholder' => 'Value']])
@include('template.formulario.submit', ['input' => 'Rescue'])

{!! Form::close() !!}

@endsection