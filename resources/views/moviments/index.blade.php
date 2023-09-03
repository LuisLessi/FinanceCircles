@extends('template.master')

@section('styles-view')
@endsection

@section('script-view')
@endsection


@section('content-view')

@if(session('success'))
<h3 class="message">{{ session('success')['messages'] }}</h3>
@endif

<table class="default-table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Institution name</th>
            <th>Applied value</th>
        </tr>
    </thead>
    <tbody class="options-cell">
        @foreach($product_list as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->institution->name}}</td>
            <td>$ {{ number_format($product->valueFromUser(Auth::user()), 2, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection