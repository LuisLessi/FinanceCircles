@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

{!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

@include('template.formulario.input', ['label' => 'Group name', 'input' => 'name', 'attributes' => ['placeholder' => 'Group name']])
@include('template.formulario.select', ['label' => 'User', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User Name']])
@include('template.formulario.select', ['label' => 'Institution', 'select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' => 'Institution Name']])
@include('template.formulario.submit', ['input' => 'Update'])

{!! Form::close() !!}


@endsection