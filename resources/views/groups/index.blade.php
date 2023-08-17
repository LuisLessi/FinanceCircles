@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

@include('template.formulario.input', ['label' => 'Group name', 'input' => 'name', 'attributes' => ['placeholder' => 'Group name']])
@include('template.formulario.select', ['label' => 'User', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User Name']])
@include('template.formulario.select', ['label' => 'Institution', 'select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' => 'Institution Name']])
@include('template.formulario.submit', ['input' => 'Register'])

{!! Form::close() !!}

@include('groups.list', ['group_list' => $groups])


@endsection