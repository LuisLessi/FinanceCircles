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
            <th>Date</th>
            <th>Type</th>
            <th>Product</th>
            <th>Group</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody class="options-cell">
        @foreach($moviments as $moviment)
        <tr>
            <td>{{$moviment->created_at->format('m/d/Y h:i A')}}</td>
            <td>{{$moviment->type == 1 ? "Application" : "Rescue"}}</td>
            <td>{{$moviment->product->name}}</td>
            <td>{{$moviment->group->name}}</td>
            <td>{{$moviment->value}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection