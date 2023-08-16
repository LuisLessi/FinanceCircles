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

<table class="default-table">
    <thead>
        <tr>
            <td>#</td>
            <td>CPF</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Birthdate</td>
            <td>Email</td>
            <td>Status</td>
            <td>Permission</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->cpf}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->birth}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->permission}}</td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection