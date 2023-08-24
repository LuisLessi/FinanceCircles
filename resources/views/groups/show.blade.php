@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection

@section('content-view')
<header>
    <h1>Group:       {{ $group->name }}</h1>
    <h2>Institution: {{ $group->institution->name}}</h2>
    <h3>Adm:         {{ $group->user->name}}</h3>
</header>

{!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
    @include('template.formulario.select', ['label' => 'User',
     'select' => 'user_id',
     'data' => $user_list,
     'attributes' => ['placeholder' => 'User']])
     @include('template.formulario.submit', ['input' => 'Add to group: ' . $group->name])
{!! Form::close() !!}


@include('user.list', ['user_list' => $group->users])

@endsection