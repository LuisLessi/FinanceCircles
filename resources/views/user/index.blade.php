@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

@include('template.formulario.input', ['label' => 'CPF', 'input' => 'cpf', 'attributes' => ['id' => 'cpf', 'placeholder' => 'CPF']])
@include('template.formulario.input', ['label' => 'Name', 'input' => 'name', 'attributes' => ['placeholder' => 'Name']])
@include('template.formulario.input', ['label' => 'Phone', 'input' => 'phone', 'attributes' => ['id' => 'phone', 'placeholder' => 'Phone']])
@include('template.formulario.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
@include('template.formulario.password', ['label' => 'Password', 'input' => 'password', 'attributes' => ['placeholder' => 'Password']])
@include('template.formulario.submit', ['input' => 'Register'])

{!! Form::close() !!}

@include('user.list', ['user_list' => $users])


@endsection