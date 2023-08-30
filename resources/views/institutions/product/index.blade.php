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
@csrf

@include('template.formulario.input', ['label' => 'Name product', 'input' => 'name'])
@include('template.formulario.input', ['label' => 'Description', 'input' => 'description'])
@include('template.formulario.input', ['label' => 'indexer', 'input' => 'index'])
@include('template.formulario.input', ['label' => 'Interest rate', 'input' => 'interest_rate'])
@include('template.formulario.submit', ['input' => 'Register'])


{!! Form::close() !!}

<table class="default-table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Indexer</th>
        <th>interest rate</th>
        <th>Options</th>
    </thead>
    <tbody>
        @forelse($institution->products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->index }}</td>
            <td>{{ $product->interest_rate }}</td>
            <td>
                {!! Form::open(['route' => ['institution.product.destroy', $institution->id, $product->id], 'method' => 'DELETE', 'class' => 'inline-form']) !!}
                {!! Form::submit('Remove', ['class' => 'delete-button']) !!}
                {!! Form::close() !!}
                <a href="" class="edit-button">Edit</a>
            </td>
        </tr>
        @empty
        <tr>
            <td>No Products</td>
        </tr>
        @endforelse
    </tbody>

</table>

@endsection